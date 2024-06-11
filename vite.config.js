import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    watch:{
      usePolling: true,
      origin: 'http:127.0.0.1:8000'
    },
    server:{
        hmr:{
            host: 'localhost'
        }
    }
});
