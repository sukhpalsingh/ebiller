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
       'node_modules/mdbootstrap/css/bootstrap.min.css',
       'node_modules/mdbootstrap/css/mdb.min.css',
       'node_modules/mdbootstrap/css/style.min.css',
   ], 'public/css/lib.css')
   .scripts([
        'node_modules/mdbootstrap/js/jquery-3.3.1.min.js',
        'node_modules/mdbootstrap/js/bootstrap.min.js',
        'node_modules/mdbootstrap/js/popper.min.js',
        'node_modules/mdbootstrap/js/mdb.min.js',
   ], 'public/js/lib.js');
