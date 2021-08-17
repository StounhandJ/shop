const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
//     .js('resourses/js/bootstrap.min.js', 'public/js')
//     .js('resourses/js/contact.min.js', 'public/js')
//     .js('resourses/js/gmaps.js', 'public/js')
//     .js('resourses/js/html5shiv.js', 'public/js')
//     .js('resourses/js/jquery.js', 'public/js')
//     .js('resourses/js/jquery.prettyPhotonpmjs', 'public/js')
//     .js('resourses/js/jquery.scrollUp.min.js', 'public/js')
//     // .js('resourses/js/main.js', 'public/js')
//     .js('resourses/js/price-range.js', 'public/js');
// mix.postCss('resources/css/animate.css', 'public/css')
//     .postCss('resources/css/bootstrap.min.css', 'public/css')
//     .postCss('resources/css/font-awesome.min.css', 'public/css')
//     .postCss('resources/css/main.css', 'public/css')
//     .postCss('resources/css/prettyPhoto.css', 'public/css')
//     .postCss('resources/css/price-range.css', 'public/css')
//     .postCss('resources/css/responsive.css', 'public/css')
//     .postCss('resources/css/style.css', 'public/css');