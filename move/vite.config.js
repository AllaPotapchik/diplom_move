import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/faq.js',
                'resources/js/account.js',
                'resources/css/app.css',
                'resources/css/schedule.css',
                'resources/css/tariff.css',
                'resources/css/subscription.css',
                'resources/css/program.css',
                'resources/css/account.css',
                'resources/css/lesson.css',
            ],
            refresh: true,
        }),
    ],
});
