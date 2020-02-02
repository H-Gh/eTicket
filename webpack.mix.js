const mix = require('laravel-mix');

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

mix.react('resources/js/frontend.app.js', 'public/js')
    .react('resources/js/backend.app.js', 'public/js')
    .sass('resources/sass/frontend.app.scss', 'public/css')
    .sass('resources/sass/backend.app.scss', 'public/css');
