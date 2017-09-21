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
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/bootstrap-theme.css',
        'resources/assets/css/custom.css',
        'resources/assets/css/jasny-bootstrap.min.css',
        'resources/assets/css/font-awesome.css',


    ], './public/css/libs.css')
    .scripts([
        'resources/assets/js/libs/jquery.min.js',
        'resources/assets/js/libs/jasny-bootstrap.min.js',

        'resources/assets/js/libs/npm.js',
        'resources/assets/js/libs/bootstrap.js',

    ], './public/js/libs.js');
