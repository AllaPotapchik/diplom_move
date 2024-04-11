import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/sign_form.js',
                'resources/css/app.css',
                'resources/css/schedule.css',
                'resources/css/tariff.css',
                'resources/css/subscription.css',
            ],
            refresh: true,
        }),
    ],
});
