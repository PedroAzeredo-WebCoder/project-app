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
      ssr: 'resources/js/ssr.ts',
      refresh: true,
    }),

    // Suporte Vue (se ainda usar Vue)
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),

    // Copia estáticos (fonts, imagens) para public/build
    viteStaticCopy({
      targets: [
        { src: 'node_modules/slick-carousel/slick/fonts/*', dest: 'fonts' },
        { src: 'node_modules/slick-carousel/slick/ajax-loader.gif', dest: 'img' },
        { src: 'resources/img/*', dest: 'img' },
        //{ src: 'resources/fonts/*', dest: 'fonts' },
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
    manifest: true,
    sourcemap: true,
  },
});
