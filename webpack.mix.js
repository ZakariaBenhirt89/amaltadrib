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

mix.js('resources/js/app.js', 'public/js').js('resources/js/datatable.js', 'public/js')
.sass('resources/scss/app.scss', 'public/css/style.css').options({autoprefixer:{remove:false}})
.copy('resources/images','public/images')
.sourceMaps();
mix.disableNotifications();