var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');


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
    "public": "./public/",
    "assets": "./resources/assets/",
    "jquery": "./vendor/bower_components/jquery/dist/",
    "bootstrap": "./vendor/bower_components/bootstrap/dist/",
    "fontawesome": "./vendor/bower_components/font-awesome/",
    "adminlte": "./vendor/bower_components/AdminLTE/dist/"
};

// keep app.css at the end
var styles = [
    paths.fontawesome + "css/font-awesome.css",
    paths.bootstrap + "css/bootstrap.css",
    paths.adminlte + "css/AdminLTE.css",
    paths.adminlte + "css/skins/_all-skins.css",
    paths.public + "css/app.css"
];

// add a path for resolve a @import in a less file ( eg: bootstrap )
var less_paths = [];


// the libraries are in a specific order
var libraries = [
    paths.jquery + "jquery.js",
    paths.bootstrap + "js/bootstrap.js",
    paths.adminlte + "js/app.js"
];

var fonts = [
    paths.fontawesome + "fonts/",
    paths.bootstrap + "fonts/"
];


elixir(function (mix) {

    mix.copy(fonts, paths.public + "build/fonts");

    mix.copy(paths.assets + "images", paths.public + "build/images");

    mix.less("app.less", paths.public + "css/app.css", {paths: less_paths});

    mix.styles(styles, paths.public + "css/app.css");

    mix.scripts(libraries, paths.public + "js/core.js", "./");

    mix.browserify('app.js', paths.public + "js/app.js");

    mix.version([
        paths.public + "css/app.css",
        paths.public + "js/core.js",
        paths.public + "js/app.js"
    ]);

});
