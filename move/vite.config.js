import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/faq.js',
                'resources/css/app.css',
                'resources/css/schedule.css',
                'resources/css/tariff.css',
                'resources/css/subscription.css',
                'resources/css/program.css',
            ],
            refresh: true,
        }),
    ],
});
