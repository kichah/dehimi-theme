import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  build: {
    outDir: 'dist',
    assetsDir: '',
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'public/js/main.js'),
      },
      output: {
        entryFileNames: 'js/bundle.js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name && /\.(png|jpe?g|gif|svg)$/.test(assetInfo.name)) {
            return 'images/[name][extname]';
          }
          if (
            assetInfo.name &&
            /\.(woff|woff2|eot|ttf|otf)$/.test(assetInfo.name)
          ) {
            return 'fonts/[name][extname]';
          }
          return 'assets/[name][extname]';
        },
      },
    },
  },

  // --- ADD THIS resolve BLOCK ---
  resolve: {
    alias: {
      // This alias tells Vite to map 'swiper/modules' to the correct path
      // within the installed swiper package.
      // It points to the ES module build of swiper's modules.
      'swiper/modules': resolve(__dirname, 'node_modules/swiper/modules'),
      // You might also need this for the main Swiper import if issues persist,
      // but 'swiper' usually resolves fine:
      // 'swiper': resolve(__dirname, 'node_modules/swiper/swiper.esm.js'),
    },
  },
  // --- END ADDITION ---
});
