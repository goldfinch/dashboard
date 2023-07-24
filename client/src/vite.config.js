import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import { viteStaticCopy } from 'vite-plugin-static-copy'
import vue from '@vitejs/plugin-vue';
import fs from 'fs';

const host = 'silverstripe-starter.lh';

export default defineConfig({

  server: {
      host,
      hmr: { host },
      https: {
          key: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.key`),
          cert: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.crt`),
      },
  },

  build: {
    emptyOutDir: true,
    outDir: '../dist',
    rollupOptions: {
      output: {
        entryFileNames: `dashboard/assets/[name].js`,
        chunkFileNames: `dashboard/assets/[name].js`,
        assetFileNames: `dashboard/assets/[name].[ext]`
      }
    }
  },

  plugins: [
      laravel({
          input: [
              'src/app.scss',
              'src/app.js',
          ],
          refresh: true,
      }),

      vue({
          template: {
              transformAssetUrls: {
                  base: null,
                  includeAbsolute: false,
              },
          },
      }),

      viteStaticCopy({
        targets: [
          // {
          //   src: './extra/images/*',
          //   dest: '../dist/dashboard/assets/extra/images',
          // },
        ],
      })
  ],

    css: {
        postcss: {
            plugins: [
                autoprefixer,
            ],
        }
    },

});
