import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const plugin = require('tailwindcss/plugin');
const flowbite = require('flowbite/plugin');


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './node_modules/preline/dist/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.jsx',
        './node_modules/flowbite/**/*.js'
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                'custom-gray': '#F8F8F8',
                'custom-white': '#FFFFFF',
                'custom-border': 'rgba(21, 41, 76, 0.4)', // Defin
                'glamfit': {
                    'magenta': '#E91E63',
                    'magenta-light': '#FF6B9D',
                    'magenta-dark': '#D946A6',
                    'purple': '#9B51E0',
                    'purple-dark': '#7856C8',
                    'navy': '#1E3A8A',
                    'navy-dark': '#0F172A',
                },
            },
            // Añadir el gradiente personalizado
            backgroundImage: {
                'custom-gradient': 'linear-gradient(to bottom, #F8F8F8 100%, #FFFFFF 100%)',
                'glamfit-gradient': 'linear-gradient(135deg, #E91E63, #9B51E0)',
                'glamfit-gradient-vertical': 'linear-gradient(180deg, #E91E63, #9B51E0)',
            },

            fontFamily: {
                Helvetica_Bold: ["Helvetica_Bold"],
                Helvetica_Heavy: ["Helvetica_Heavy"],
                Helvetica_Black: ["Helvetica_Black"],
                Helvetica_Light: ["Helvetica_Light"],
                Helvetica_Medium: ["Helvetica_Medium"],

                Urbanist_Black: ["Urbanist_Black"],
                Urbanist_Bold: ["Urbanist_Bold"],
                Urbanist_Light: ["Urbanist_Light"],
                Urbanist_Medium: ["Urbanist_Medium"],
                Urbanist_Regular: ["Urbanist_Regular"],
                Urbanist_Semibold: ["Urbanist_Semibold"],
            },

            screens: {
                xs: '320px',
                "2xs": "420px",
                sm: "640px",
                md: "768px",
                "2md": "850px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px",
            },
            colors: {
                azulboost: '#006BF6',
            }


        },
    },
    variants: {
        extend: {
            opacity: ['focus-within'],
        },
    },
    plugins: [
        forms,
        typography,
        flowbite,
        // add custom variant for expanding sidebar
        plugin(({ addVariant, e }) => {
            addVariant('sidebar-expanded', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => `.sidebar-expanded .${e(`sidebar-expanded${separator}${className}`)}`);
            });
        }),
        
    ],
};
