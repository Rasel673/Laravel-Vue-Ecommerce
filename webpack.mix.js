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

    // mix.styles([
    //     'resources/frontend/css/bootstrap.min.css',
    //     'resources/frontend/css/animate.css',
    //     'resources/frontend/css/materialdesignicons.min.css',
    //     'resources/frontend/css/jquery.simpleLens.css',
    //     'resources/frontend/css/jquery-ui.min.css',
    //     'resources/frontend/css/meanmenu.min.css',
    //     'resources/frontend/css/nivo-slider.css',
    //     'resources/frontend/css/owl.carousel.css',
    //     'resources/frontend/style.css',
    //     'resources/frontend/css/responsive.css',
       
    // ], 'public/frontend/all.css')