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
    //mix.less('app.less');
    mix.sass('app.scss', 'resources/assets/css');

    mix.styles([
        'libs/bootstrap.min.css',
        'libs/select2.css',
        'libs/bootstrap-datetimepicker.min.css',
        'libs/select2-bootstrap.css',
        'libs/font-awesome.min.css',
        'mac-styles.css',
        'app.css',
    ]);

    mix.scripts([
        'libs/jquery.js',
        'libs/select2.js',
        'libs/bootstrap.min.js',
        'libs/moment.js',
        'libs/bootstrap-datetimepicker.js',
        'app.js',
    ]);
});
