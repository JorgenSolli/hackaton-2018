let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.combine([
    'resources/assets/js/app.js',
    'resources/assets/js/apiCalls.js',
    'resources/assets/js/vendor/semantic.js',
    'resources/assets/js/vendor/semantic-calendar.js',
], 'public/js/app.min.js')