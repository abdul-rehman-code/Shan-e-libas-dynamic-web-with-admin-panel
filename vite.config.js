import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Agar live server par public_html main directory hy:
    base: process.env.NODE_ENV === 'production' ? '/' : '/',
});