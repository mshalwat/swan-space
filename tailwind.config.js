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
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                heading: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'space-black': '#0a0e27',
                'space-dark': '#121629',
                'space-navy': '#1a1f3a',
                'deep-purple': '#2d1b69',
                'cosmic-purple': '#5b21b6',
                'nebula-pink': '#ec4899',
                'nebula-purple': '#a855f7',
                'cyan-bright': '#06b6d4',
            },
            boxShadow: {
                '3d-sm': '0 4px 12px rgba(139, 92, 246, 0.3), 0 2px 6px rgba(0, 0, 0, 0.5)',
                '3d-md': '0 8px 24px rgba(139, 92, 246, 0.4), 0 4px 12px rgba(0, 0, 0, 0.6)',
                '3d-lg': '0 16px 48px rgba(139, 92, 246, 0.5), 0 8px 24px rgba(0, 0, 0, 0.7)',
                'glow': '0 0 20px rgba(139, 92, 246, 0.6), 0 0 40px rgba(139, 92, 246, 0.3)',
                'glow-pink': '0 0 20px rgba(236, 72, 153, 0.6), 0 0 40px rgba(236, 72, 153, 0.3)',
                'glow-cyan': '0 0 20px rgba(6, 182, 212, 0.6), 0 0 40px rgba(6, 182, 212, 0.3)',
            },
            animation: {
                'twinkle': 'twinkle 3s ease-in-out infinite',
                'float': 'float 3s ease-in-out infinite',
                'glow-pulse': 'glow-pulse 2s ease-in-out infinite',
            },
            keyframes: {
                twinkle: {
                    '0%, 100%': { opacity: '0.3' },
                    '50%': { opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px) translateX(0px)' },
                    '50%': { transform: 'translateY(-20px) translateX(10px)' },
                },
                'glow-pulse': {
                    '0%, 100%': { boxShadow: '0 0 20px rgba(139, 92, 246, 0.6), 0 0 40px rgba(139, 92, 246, 0.3)' },
                    '50%': { boxShadow: '0 0 30px rgba(139, 92, 246, 0.8), 0 0 60px rgba(139, 92, 246, 0.5)' },
                },
            },
        },
    },

    plugins: [forms],
};
