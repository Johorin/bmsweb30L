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

mix.js('resources/js/app.js', 'public/js');
    //.sass('resources/sass/app.scss', 'public/css')
    //.sourceMaps();
mix.sass('resources/sass/layout.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/menu.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/list.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/detail.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/update.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/deleteUser.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/listUser.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/insertIniData.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/showCart.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/orderHistory.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/insertUser.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/insert.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/delete.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/orderStatus.scss', 'public/css').sourceMaps();
mix.sass('resources/sass/showSalesByMonth.scss', 'public/css').sourceMaps();
