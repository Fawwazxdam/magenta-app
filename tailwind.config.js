import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'background': '#FAFAFA',    //very light cream
                'primary': '#45bcc3',       //light blue
                'secondary': '#e09ecd',     //light pink
                'accent': '#d37877',        //light red
                'light': '#fbfefe',         //white
                'dark': '#071414',
               },
        },
    },

    plugins: [
        forms,
        require('daisyui'),
    ],
};
