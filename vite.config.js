import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'
import autoprefixer from 'autoprefixer'
import path from 'path'

export default defineConfig({

    base: process.env.NODE_ENV === 'production'
        ? '/wp-content/themes/trak/dist/'
        : '/',

    plugins: [
        // liveReload(__dirname + '/**/*.php'),

        // Следим только за файлами в корне темы и в ключевых подпапках
        liveReload([
            './*.php',                  // Все PHP-файлы в корне темы (index.php, header.php и т.д.)
            './inc/**/*.php',            // Файлы внутри папки inc
            './template-parts/**/*.php'  // Файлы внутри папки template-parts
        ], {
            alwaysReload: true
        }),
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, './src'),
        },
    },

    css: {
        postcss: {
            plugins: [
                autoprefixer()
            ],
        },
    },

    build: {
        outDir: 'dist',
        manifest: true,
        rollupOptions: {
            input: 'src/assets/js/main.js',
        },
    },

    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        cors: true,
        hmr: {
            host: 'localhost',
        },
        watch: {
            // Запрещаем Vite даже заглядывать в node_modules и dist при отслеживании
            ignored: [
                '**/node_modules/**',
                '**/dist/**'
            ]
        }
    },
})
