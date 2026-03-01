/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'sans-serif'],
            },
            colors: {
                brand: {
                    red:      '#FF2D20',
                    'red-dark': '#E0251B',
                    'red-light': '#FF4D42',
                },
            },
            backgroundImage: {
                'hero-gradient': 'linear-gradient(to right, rgba(15,23,42,1) 30%, rgba(15,23,42,0) 100%)',
                'card-overlay':  'linear-gradient(to top, rgba(15,23,42,0.95) 0%, rgba(15,23,42,0) 60%)',
            },
            animation: {
                'fade-in':    'fadeIn 0.5s ease-in-out',
                'slide-up':   'slideUp 0.4s ease-out',
            },
            keyframes: {
                fadeIn:  { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                slideUp: { '0%': { opacity: '0', transform: 'translateY(20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
            },
        },
    },
    plugins: [],
};
