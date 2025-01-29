import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.css',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',

    ],

    theme: {
        extend: {
            // Färger
            colors: {
                contentBox: {
                    background: '#D7DAE5', // Ljus grå
                    border: '#F57C00',     // Brand orange
                    text: '#000000',       // Svart
                },
                buttonStyle: {
                    background: '#4E5563', // Grå
                    border: '#F57C00', // Brand Orange
                    text: '#D7DAE5', // Grädd vit
                    hooverOn: '#6B7384', // Ljus Grå
                },
            },

             // Bakgrundsbilder (för gradienten)
             backgroundImage: {
                'gradient-diagonal': 'linear-gradient(45deg, #B2B5C0, #525560)',
            },

            // Skugga
            boxShadow: {
                'content-box': '10px 10px 15px 5px rgba(10, 8, 6, 0.8)', // Anpassad skugga
            },

            // Typsnitt
            fontFamily: {
                heading: ['"Inter"', 'sans-serif'], // Rubriker
                body: ['"Roboto"', 'sans-serif'],   // Brödtext
            },

            // Max bredd
            maxWidth: {
                'screen-1920': '1920px',
            },
        },
        safelist: [
    'btn', 'btn-default', 'btn-large', 'btn-small'
    ],
    },

    plugins: [forms],
};
