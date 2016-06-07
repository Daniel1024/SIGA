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

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass('style.scss')
        .sass('inicio.scss')
        .sass('admin.scss');
});

elixir(function(mix) {
     mix.scripts([
            'app.js'
         ], 'public/js/app.js')
         .scripts([
             '../../../node_modules/jquery/dist/jquery.js',
             '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
             'jquery.dataTables.min.js',
            'admin.js'
         ], 'public/js/admin.js');
});
