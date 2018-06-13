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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/client/assets/js/app.js', 'public/client/js')
    .sass('resources/client/assets/sass/app.scss', 'public/client/css')
    .extract([
        'axios',
        'lodash',
        'vue',
        'vue-router',
        'vuex',
        'vue2-datatable-component',
        'vue-awesome-notifications',
        'vue-select',
        'vue-sweetalert2',
        '@casl/ability',
        '@casl/vue',
        'vue-ckeditor2'
    ])
    .version();

mix.autoload({
    'jquery': ['$', 'window.jQuery', 'jQuery'],
    'moment': ['moment','window.moment'],
});
