import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import * as path from 'path'
import { viteStaticCopy } from 'vite-plugin-static-copy'
import vue from '@vitejs/plugin-vue';
import fs from 'fs';
import cfg from './app.config.js'

const host = cfg.host;

export default defineConfig({

  resolve: {
      alias: {
          '@': path.resolve(__dirname),
      }
  },

  server: {
      host,
      hmr: { host },
      https: {
          key: fs.readFileSync(`${cfg.certs}.key`),
          cert: fs.readFileSync(`${cfg.certs}.crt`),
      },
  },
  // root: path.join(__dirname, 'src'),
  // base: '',
  build: {
    emptyOutDir: true,
    outDir: '../dist',
    rollupOptions: {
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `js/[name].js`,
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return '[name][extname]'
          } else if (
            assetInfo.name.match(/(\.(woff2?|eot|ttf|otf)|font\.svg)(\?.*)?$/)
          ) {
            return 'fonts/[name][extname]'
          } else if (assetInfo.name.match(/\.(jpg|png|svg)$/)) {
            return 'images/[name][extname]'
          }

          return 'js/[name][extname]'
        }
      }
    }
  },

  plugins: [

      laravel({
          input: [
              'src/dashboard.scss',
              'src/dashboard.js',
          ],
          refresh: true,
          // buildDirectory: '',
      }),

      vue({
          template: {
              transformAssetUrls: {
                  base: null,
                  includeAbsolute: false,
              },
          },
      }),

      // viteStaticCopy({
      //   targets: [
      //     {
      //       src: './extra/images/*',
      //       dest: '../dist/dashboard/assets/extra/images',
      //     },
      //   ],
      // })
  ],

  css: {
    preprocessorOptions: {
      scss: {
        additionalData: cfg.sassAdditionalData,
      },
    },
    postcss: {
      plugins: [
        autoprefixer,
      ],
    }
  },

});
