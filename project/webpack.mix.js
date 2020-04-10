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
// mix.react('resources/js/category/index.js', 'public/js/categoryComponent.js');

mix.setResourceRoot('../../');

mix.setPublicPath('./../assets/')
    .js('resources/js/admin.js', 'admin/js/app.js')
    .js('resources/js/app.js', 'front/js/app.js')
    .sass('resources/sass/app.scss', 'front/css/app.css')
;