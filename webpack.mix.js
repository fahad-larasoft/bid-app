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
   .sass('resources/assets/sass/app.scss', 'public/css');


mix.combine([
    'resources/assets/css/bootstrap-datepicker.css',
    'resources/assets/css/jquery.socialfeed.css'

], 'public/css/all.css', 'resources/assets').version();

mix.combine([
    "resources/assets/js/bootstrap-datepicker.js",
    "resources/assets/js/bootbox.min.js"
], 'public/js/all.js', 'resources/assets').version();