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

mix.js('resources/assets/js/app.js', 'public/js')
    // .js('resources/assets/js/HTMLEditor.js', 'public/js')
    .copy('resources/assets/js/presentation', 'public/js/presentation')
    .copy('resources/assets/js/libs', 'public/js')
    .copy('resources/assets/images', 'public/images')
    .sass('resources/assets/sass/presentation.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css');
