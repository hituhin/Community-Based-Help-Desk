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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'resources/assets/css/libs/blog-post.css',
    'resources/assets/css/libs/bootstrap.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/sb-admin-2.css'

], 'public/css/libs.css');

mix.scripts([
    'public/app-assets/js/core/libraries/jquery.min.js',
    'public/app-assets/vendors/js/ui/tether.min.js',
    'public/app-assets/js/core/libraries/bootstrap.min.js',
    'public/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js',
    'public/app-assets/vendors/js/ui/unison.min.js',
    'public/app-assets/vendors/js/ui/blockUI.min.js',
    'public/app-assets/vendors/js/ui/jquery.matchHeight-min.js',
    'public/app-assets/vendors/js/ui/screenfull.min.js',
    'public/app-assets/vendors/js/extensions/pace.min.js',
    'public/app-assets/vendors/js/charts/chart.min.js',
    'public/app-assets/js/core/app-menu.js',
    'public/app-assets/js/core/app.js'


], 'public/js/libs.js');
