var elixir = require('laravel-elixir');

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
var paths = {
    "assets": "./resources/assets/",
    "jquery": "./vendor/bower_components/jquery/",
    "semantic": "./vendor/bower_components/semantic/",
    "vue": "./vendor/bower_components/vue/"
};

elixir(function (mix) {

    /* semantic build version */
    mix.copy(paths.semantic + 'dist/', 'public/semantic');

    /* app specific style */
    mix.less("app.less", "public/css/", {
        paths: ['']
    });

    /* libraries code */
    mix.scripts([
        paths.jquery + "dist/jquery.js",
        paths.vue + "dist/vue.js"
    ], "public/js/core.js", "./");

    /* app specific code */
    mix.scripts([
        paths.assets + "js/app.js"
    ], "public/js/app.js", "./");

    /* versionning */
    mix.version([
        "public/css/app.css",
        "public/js/core.js",
        "public/js/app.js"
    ]);
});
