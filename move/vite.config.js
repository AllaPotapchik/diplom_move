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
                'resources/js/teacher.js',
                'resources/js/user.js',
                'resources/js/pay.js',
                'resources/js/slider.js',
                'public/admin/admin.js',
                'resources/css/app.css',
                'resources/css/index.css',
                'resources/css/schedule.css',
                'resources/css/tariff.css',
                'resources/css/subscription.css',
                'resources/css/program.css',
                'resources/css/account.css',
                'resources/css/lesson.css',
                'resources/css/dance_types.css',
                'resources/css/order.css',
                'resources/css/slider.css',
                'resources/css/teacher.css',
                'resources/css/contact.css',
            ],
            refresh: true,
        }),
    ],
});
