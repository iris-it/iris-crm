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
    "jquery": "./vendor/bower_components/jquery/",
    "bootstrap": "./vendor/bower_components/bootstrap/dist/",
    "fontawesome": "./vendor/bower_components/font-awesome/",
    "adminlte": "./vendor/bower_components/AdminLTE/dist/",
    "duallistbox": "./vendor/bower_components/bootstrap-duallistbox/",
    "ionicons": "./vendor/bower_components/Ionicons/",
    "chartjs": "./vendor/bower_components/Chart.js/",

    // AdminLTE inner plugins
    "adminlte_plugins" : "./vendor/bower_components/AdminLTE/plugins/"

};

// keep app.css at the end
var styles = [
    paths.fontawesome + "css/font-awesome.css",
    paths.bootstrap + "css/bootstrap.css",
    paths.adminlte + "css/AdminLTE.css",
    paths.adminlte + "css/skins/_all-skins.css",
    paths.duallistbox + "src/bootstrap-duallistbox.css",
    paths.public + "css/app.css",
    paths.ionicons + "css/ionicons.min.css",


    // AdminLTE inner plugins
    paths.adminlte_plugins + "datepicker/datepicker3.css"

];

// add a path for resolve a @import in a less file ( eg: bootstrap )
var less_paths = [];


// the libraries are in a specific order
var libraries = [
    paths.jquery + "jquery.js",
    paths.bootstrap + "js/bootstrap.js",
    paths.adminlte + "js/app.js",
    paths.duallistbox + "dist/jquery.bootstrap-duallistbox.min.js",
    paths.chartjs + "dist/Chart.bundle.min.js",

    // AdminLTE inner plugins
    paths.adminlte_plugins + "datepicker/bootstrap-datepicker.js",
    paths.adminlte_plugins + "datepicker/locales/bootstrap-datepicker.fr.js",

    // jQuery helper
    paths.assets + "js/crm.js"

];

var fonts = [
    paths.fontawesome + "fonts/",
    paths.bootstrap + "fonts/",
    paths.ionicons + "fonts/"
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
