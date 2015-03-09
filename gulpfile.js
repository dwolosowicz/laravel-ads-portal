var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less("app.less", "resources/assets/css");

    mix.styles([
        'app.css',
        'bootstrap-datetimepicker.css',
        'select2-bootstrap.css'
    ], 'public/css/all.css', 'resources/assets/css');

    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'moment.js',
        'bootstrap-datetimepicker.js',
        'select2.js',
        '*.js'
    ], 'public/js/all.js', 'resources/assets/js');
});
