import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['REM', ...defaultTheme.fontFamily.sans],
            },
            animation:{
                'load-bar': 'load 1.5s linear infinite',
               
            },
            keyframes:{
                'load':{

                    '100%':{ 'transform':'translateX(43vw )'}
                }
            }
        },
    },

    plugins: [forms, typography],
};
