import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from 'autoprefixer';
import * as path from 'path';
import vue from '@vitejs/plugin-vue';
import fs from 'fs';
import initCfg from './app.config.js';

export default defineConfig(({ command, mode, ssrBuild }) => {
  const cfg = initCfg(command, mode, ssrBuild);

  const { host } = cfg;

  fs.writeFileSync('app.config.json', JSON.stringify(cfg.public));

  return {
    resolve: {
      alias: {
        '@': path.resolve(__dirname),
      },
    },

    server: {
      host,
      hmr: { host },
      https: {
        key: fs.readFileSync(`${cfg.certs}.key`),
        cert: fs.readFileSync(`${cfg.certs}.crt`),
      },
    },
    build: {
      chunkSizeWarningLimit: 1500,
      emptyOutDir: true,
      outDir: '../dist',
      rollupOptions: {
        output: {
          entryFileNames: '[name].js',
          chunkFileNames: 'js/[name]-[hash].js',
          assetFileNames: (assetInfo) => {
            if (assetInfo.name.endsWith('.css')) {
              return '[name][extname]';
            }
            if (
              assetInfo.name.match(/(\.(woff2?|eot|ttf|otf)|font\.svg)(\?.*)?$/)
            ) {
              return 'fonts/[name][extname]';
            }
            if (assetInfo.name.match(/\.(jpg|png|svg)$/)) {
              return 'images/[name][extname]';
            }

            return 'js/[name][extname]';
          },
        },
      },
    },

    plugins: [
      laravel({
        input: ['src/dashboard-style.scss', 'src/dashboard.js'],
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
    ],

    css: {
      preprocessorOptions: {
        scss: {
          additionalData: cfg.sassAdditionalData,
        },
      },
      postcss: {
        plugins: [autoprefixer],
      },
    },
  };
});
