import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'
import autoprefixer from 'autoprefixer'
import path from 'path'

export default defineConfig({

    base: process.env.NODE_ENV === 'production'
        ? '/wp-content/themes/trak/dist/'
        : '/',

    plugins: [
        liveReload(__dirname + '/**/*.php'),
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
        // preprocessorOptions: {
        //     scss: {
        //         // Включаем современный API Sass, который требует Vite 5.4+ / Vite 6
        //         api: 'modern-compiler',

        //         // Физически склеиваем импорт переменных с началом каждого SCSS-файла
        //         additionalData: `@use "src/assets/scss/base/variables" as *;\n`
        //     }
        // } 
        //! не работает

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
    },
})
