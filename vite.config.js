import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/app.scss",
                'resources/js/app.js',
                "resources/js/auth/login.js",
                "resources/js/auth/register.js",
                "resources/js/product.js",
            ],
            refresh: true,
        }),
    ],
});
