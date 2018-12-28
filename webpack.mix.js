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

mix
// .js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/jquery-ui/themes/base/theme.css',
        'node_modules/jquery-ui/themes/base/datepicker.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.css',
        'node_modules/bootstrap-imageupload/dist/css/bootstrap-imageupload.min.css',
        'resources/assets/css/main.css',
   ], 'public/css/lib.css')
   .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        // 'node_modules/popper.js/dist/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/jquery-ui/ui/widgets/datepicker.js',
        'node_modules/bootstrap-imageupload/dist/js/bootstrap-imageupload.min.js',
   ], 'public/js/lib.js')
   .copyDirectory('node_modules/jquery-ui/themes/base/images', 'public/css/images')
   .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
   ;
