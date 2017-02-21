<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gentellela Alela! | </title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('css/all-dashboard.min.css') }}">

        <style>
            .nav_menu {
                margin-bottom: 15px;
            }
            .fixed-height-270 {
                height: 270px;
            }

            .scroll-height-270 {
                max-height: 270px; overflow-y: scroll;
            }

            #serialChart {
                width		: 100%;
                height		: 500px;
                font-size	: 11px;
            }

            /* Custome scrollbar */
            ::-webkit-scrollbar {
                width: 7px;
                height: 7px;
            }
            ::-webkit-scrollbar-button {
                width: 0px;
                height: 0px;
            }
            ::-webkit-scrollbar-thumb {
                background: #e1e1e1;
                border: 0px none #ffffff;
                border-radius: 50px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #ffffff;
            }
            ::-webkit-scrollbar-thumb:active {
                background: #000000;
            }
            ::-webkit-scrollbar-track {
                background: #666666;
                border: 0px none #ffffff;
                border-radius: 50px;
            }
            ::-webkit-scrollbar-track:hover {
                background: #666666;
            }
            ::-webkit-scrollbar-track:active {
                background: #333333;
            }
            ::-webkit-scrollbar-corner {
                background: transparent;
            }
        </style>

        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
        </div>

        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <script src="{{ asset('js/all-dashboard.min.js') }}"></script>

        {{--<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>--}}
        {{--<script src="https://www.amcharts.com/lib/3/serial.js"></script>--}}
        {{--<script src="https://www.amcharts.com/lib/3/pie.js"></script>--}}
        {{--<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>--}}
        {{--<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>--}}

        <script src="{{ asset('js/custom.js') }}"></script>

        @stack('scripts')

    </body>
</html>