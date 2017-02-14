@extends('layouts.blank')

@push('stylesheets')
<link rel="stylesheet" href="{{ url('css/all-dashboard.css') }}">
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
<style>

</style>
@endpush

@section('main_container')
        <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            @include('partials.dash_box', [
                'title' => 'New',
                'content' => 'The issues created recently',
                'icon' => 'fa fa-caret-square-o-right',
                'count' => $count[1],
                'id' => 'countNewIssues'
            ])

            @include('partials.dash_box', [
                'title' => 'In Progress',
                'content' => 'The issues are fixing',
                'icon' => 'fa fa-comments-o',
                'count' => $count[2],
                'id' => 'countInProgressIssues'
            ])

            @include('partials.dash_box', [
                'title' => 'Resolved',
                'content' => 'The issues are fixed and wait to testing',
                'icon' => 'fa fa-sort-amount-desc',
                'count' => $count[3],
                'id' => 'countResolvedIssues'
            ])

            @include('partials.dash_box', [
                'title' => 'Closed',
                'content' => 'The issues are tested, wait to deploy',
                'icon' => 'fa fa-check-square-o',
                'count' => $count[5],
                'id' => 'countClosedIssues'
            ])
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaction Summary
                            <small>Weekly progress</small>
                        </h2>
                        <div class="filter">
                            <div id="reportrange" class="pull-right"
                                 style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="demo-container" style="height:280px">
                                <div id="chart_plot_02" class="demo-placeholder"></div>
                            </div>
                            <div class="tiles">
                                <div class="col-md-4 tile">
                                    <span>Total Sessions</span>

                                    <h2>231,809</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
                                       <canvas width="200" height="60"
                                               style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>

                                <div class="col-md-4 tile">
                                    <span>Total Revenue</span>

                                    <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60"
                                        style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Sessions</span>

                                    <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60"
                                         style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div>
                                <div class="x_title">
                                    <h2>Top Profiles</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="list-unstyled top_profiles scroll-view">
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>

                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>

                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>

                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                        </a>

                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>

                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>

                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-blue profile_thumb">
                                            <i class="fa fa-user blue"></i>
                                        </a>

                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>

                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>

                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>

                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>

                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>

                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media event">
                                        <a class="pull-left border-green profile_thumb">
                                            <i class="fa fa-user green"></i>
                                        </a>

                                        <div class="media-body">
                                            <a class="title" href="#">Ms. Mary Jane</a>

                                            <p><strong>$2300. </strong> Agent Avarage Sales </p>

                                            <p>
                                                <small>12 Sales Today</small>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Weekly Summary
                            <small>Activity shares</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row"
                             style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                            <div class="col-md-7" style="overflow:hidden;">
                        <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                      <canvas width="200" height="60"
                                              style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                                <h4 style="margin:18px">Weekly sales progress</h4>
                            </div>

                            <div class="col-md-5">
                                <div class="row" style="text-align: center;">
                                    <div class="col-md-4">
                                        <canvas id="newIssuesDonut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">New Issues</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas id="inProgressIssuesDonut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">In Progress Issues</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas id="closedIssuesDonut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Closed Issues</h4>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--<div class="row">--}}
        {{----}}
        {{--<div class="col-md-4">--}}
        {{--@include('partials.panel_list')--}}
        {{--</div>--}}
        {{----}}
        {{--</div>--}}

    </div>
</div>
<!-- /page content -->
@endsection

@push('scripts')
<script src="{{ url('js\all-dashboard.min.js') }}"></script>
{{--<script src="{{ url('js\custom.js') }}"></script>--}}
<script>

    var colors1 = ["#455C73", "#9B59B6", "#BDC3C7", "#26B99A", "#3498DB"];
    var colors2 = ["#34495E", "#B370CF", "#CFD4D8", "#36CAAB", "#49A9EA"];

    $(function() {

        refreshData();

        setInterval(function () {
            refreshData()
        }, 300000);

        function chart(id, data, label, colors1, colors2) {
            if ($('#' + id).length) {
                var ctx = document.getElementById(id);
                var canvasDoughnut = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            data: data,
                            backgroundColor: colors1,
                            hoverBackgroundColor: colors2
                        }]
                    },
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)"
                });
            }
        }

        function refreshData() {
            console.log('Refresh data on ' + new Date());

//            http://redmine-dashboard.dev/json/get_issue_between?sdate=2017-01-01&edate=2017-01-31

            $.get('json/count_all_issues', function (res) {
                $('#countNewIssues .count').text(res[1]);
                $('#countInProgressIssues .count').text(res[2]);
                $('#countResolvedIssues .count').text(res[3]);
                $('#countClosedIssues .count').text(res[5]);
            });

            $.get('json/count_issues_array?status_id=1', function (res) {
                chart('newIssuesDonut', res.number, res.name, colors1, colors2);
            });

            $.get('json/count_issues_array?status_id=2', function (res) {
                chart('inProgressIssuesDonut', res.number, res.name, colors1, colors2);
            });

            $.get('json/count_issues_array?status_id=5', function (res) {
                chart('closedIssuesDonut', res.number, res.name, colors1, colors2);
            });

        }

        function init_daterangepicker() {

            if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
            console.log('init_daterangepicker');

            var cb = function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            };

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function() {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function() {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function() {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function() {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function() {
                $('#reportrange').data('daterangepicker').remove();
            });

        }


    });

</script>
@endpush