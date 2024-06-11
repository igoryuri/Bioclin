/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],
    plugins:[
        require('preline/plugin'),
        require('@tailwindcss/forms'),
    ],
    theme: {
        extend: {
            backgroundImage:{
                'fundo1': "url('/Bioclin/src/assets/hero1.jpg')"
            },
            colors: {
                bioclin: '#044871',
                primary: '#1e40af',
                footer: '#f3efef',
                cinzabioclin: '#99abbb',
                cinzasuellen: '#92adbc',
                "azul-bioclin": "#29416d",
                "cinza-bioclin": "#99abbb",
            },
            fontFamily: {
                'open-sans': ['Roboto Slab', 'sans-serif'],
                // 'open-sans': ['Open Sans', 'sans-serif'],
            },
            maxWidth:{
              '8xl': '88rem',
              '9xl': '96rem',
              '10xl': '104rem',
              '11xl': '112rem',
            },
            height:{
                '100': '450px',
                '110': '500px'
            },
            screens:{
                'lg': '1081px'
            }
        },
    },
}
