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

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/js/jquery-ui.min.js',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/fontawesome-all.min.js',
    'resources/assets/js/jasny-bootstrap.min.js',
    'resources/assets/js/bootstrap-datepicker.min.js',
    'resources/assets/js/locales/bootstrap-datepicker.pt-BR.js',
    ], 'public/js/app.min.js')
   .sass('resources/assets/sass/app.scss', 'public/css/app.min.css');
