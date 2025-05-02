import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';
import { viteStaticCopy } from 'vite-plugin-static-copy';
import viteImagemin from 'vite-plugin-imagemin';
import manifestSRI from 'vite-plugin-manifest-sri';

export default defineConfig({
  plugins: [
    // Integração Laravel + Vite
    laravel({
      input: [
        'resources/js/app.ts',
        'resources/css/app.css',
        'resources/scss/app.scss',
      ],
      refresh: true,
      buildDirectory: 'build', // pasta dentro de public
    }),

    // Suporte Vue (remova se não usar)
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),

    // Copia estáticos (fonts, imagens) para public/build/assets
    viteStaticCopy({
      targets: [
        { src: 'node_modules/slick-carousel/slick/fonts/*', dest: 'assets/fonts' },
        { src: 'node_modules/slick-carousel/slick/ajax-loader.gif', dest: 'assets/img' },
        { src: 'resources/img/*', dest: 'assets/img' },
        //{ src: 'resources/fonts/*', dest: 'assets/fonts' },
      ],
    }),

    // Compressão de imagens (WEBP)
    viteImagemin({ webp: { quality: 100 } }),

    // Gera atributos SRI no manifest
    manifestSRI(),
  ],

  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
      'ziggy-js': path.resolve(__dirname, 'vendor/tightenco/ziggy'),
    },
  },

  optimizeDeps: {
    include: ['axios', 'bootstrap'],
  },

  build: {
    outDir: 'public/build',
    emptyOutDir: true,
    manifest: true,
    sourcemap: true,
    rollupOptions: {
      output: {
        entryFileNames: 'assets/js/[name].[hash].js',
        chunkFileNames: 'assets/js/[name].[hash].js',
        assetFileNames: ({ name }) => {
          const fileName = name ?? '';
          const ext = path.extname(fileName);
          const base = path.basename(fileName, ext);

          if (ext === '.css') {
            return `assets/css/${base}.[hash][extname]`;
          }
          if (/\.(png|jpe?g|gif|svg|webp)$/.test(ext)) {
            return `assets/img/${base}.[hash][extname]`;
          }
          if (/\.(woff2?|ttf|eot|otf)$/.test(ext)) {
            return `assets/fonts/${base}.[hash][extname]`;
          }
          return `assets/[name]_[hash][extname]`;
        },
      },
    },
  },
});
