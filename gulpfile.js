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

// Gentelella vendors path : vendor/bower_components/gentelella/vendors

elixir(function(mix) {
    
    /********************/
    /* Copy Stylesheets */
    /********************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

    // Gentelella
    mix.copy('vendor/bower_components/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

    /****************/
    /* Copy Scripts */
    /****************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');

    // jQuery
    mix.copy('vendor/bower_components/gentelella/vendors/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');

    // Gentelella
    //mix.copy('vendor/bower_components/gentelella/build/js/custom.min.js', 'public/js/gentelella.min.js');


    var vendor = 'vendor/bower_components/gentelella/vendors/';
    // datatables

    mix.combine([
        vendor + 'datatables.net/js/jquery.dataTables.min.js',
        vendor + 'datatables.net-bs/js/dataTables.bootstrap.min.js',
        vendor + 'datatables.net-buttons/js/dataTables.buttons.min.js',
        vendor + 'datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
        vendor + 'datatables.net-buttons/js/buttons.flash.min.js',
        vendor + 'datatables.net-buttons/js/buttons.html5.min.js',
        vendor + 'datatables.net-buttons/js/buttons.print.min.js',
        vendor + 'datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
        vendor + 'datatables.net-keytable/js/dataTables.keyTable.min.js',
        vendor + 'datatables.net-responsive/js/dataTables.responsive.min.js',
        vendor + 'datatables.net-responsive-bs/js/responsive.bootstrap.js',
        vendor + 'datatables.net-scroller/js/dataTables.scroller.min.js',

    ], 'public/js/all-datatable.min.js');

    mix.combine([
        vendor + 'fastclick/lib/fastclick.js',
        vendor + 'nprogress/nprogress.js',
        vendor + 'Chart.js/dist/Chart.min.js',

        vendor + 'jquery-sparkline/dist/jquery.sparkline.min.js',
        vendor + 'Flot/jquery.flot.js',
        vendor + 'Flot/jquery.flot.pie.js',
        vendor + 'Flot/jquery.flot.time.js',
        vendor + 'Flot/jquery.flot.stack.js',

        vendor + 'Flot/jquery.flot.resize.js',
        vendor + 'flot.orderbars/js/jquery.flot.orderBars.js',
        vendor + 'flot-spline/js/jquery.flot.spline.min.js',
        vendor + 'flot.curvedlines/curvedLines.js',
        vendor + 'DateJS/build/date.js',
        vendor + 'moment/min/moment.min.js',
        vendor + 'bootstrap-daterangepicker/daterangepicker.js',
        'vendor/bower_components/gentelella/build/js/custom.min.js',

        'node_modules/amcharts3/amcharts/amcharts.js',
        'node_modules/amcharts3/amcharts/serial.js',
        'node_modules/amcharts3/amcharts/pie.js',
        'node_modules/amcharts3/amcharts/plugins/export/export.js',
        'node_modules/amcharts3/amcharts/themes/light.js'

    ], 'public/js/all-dashboard.min.js');

    mix.combine([
        vendor + 'bootstrap/dist/css/bootstrap.min.css',
        vendor + 'font-awesome/css/font-awesome.min.css',
        vendor + 'nprogress/nprogress.css',
        vendor + 'bootstrap-daterangepicker/daterangepicker.css',
        'vendor/bower_components/gentelella/build/css/custom.min.css',
        'node_modules/amcharts3/amcharts/plugins/export/export.css'

    ], 'public/css/all-dashboard.min.css');

    mix.copy(vendor + 'Chart.js/dist/Chart.min.js', 'public/js/Chart.min.js');

    /**************/
    /* Copy Fonts */
    /**************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/fonts/', 'public/fonts');

    // Copy All images of AmChart
    mix.copy('node_modules/amcharts3/amcharts/**/*', 'public/amcharts');
});
