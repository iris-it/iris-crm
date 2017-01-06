const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var fonts = [
    "./node_modules/bootstrap-sass/assets/fonts/bootstrap/",
    "./node_modules/font-awesome/fonts/",
    "./node_modules/ionicons/dist/fonts/"
];

elixir(mix => {

    mix.copy(fonts, "public/build/fonts");

    mix.copy("resources/assets/img", "public/build/css/images");

    mix.sass('app.scss');

    mix.webpack('app.js');

    mix.version(['css/app.css', 'js/app.js']);

});
