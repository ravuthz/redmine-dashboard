@extends('layouts.blank')

@push('stylesheets')
    <link rel="stylesheet" href="{{ url('css/all-dashboard.min.css') }}">
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
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
                            <small>Monthly progress</small>
                        </h2>
                        <div class="filter">
                            <div id="reportRange1" class="pull-right1" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>January 1st 2016 - December 31th 2017</span> <b class="caret"></b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="serialChart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Closed Issues
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

                        <div class="col-md-12">
                            <div id="closeIssueChart" style="height: 500px; width: 100%;"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All New Issues
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
                        <div id="allIssuePieChart1" style="height: 500px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Closed Issues
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
                        <div id="allIssuePieChart2" style="height: 500px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection