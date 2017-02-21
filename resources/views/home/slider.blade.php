@extends('layouts.blank')

@push('stylesheets')
{{--<link rel="stylesheet" href="{{ url('css/all-dashboard.css') }}">--}}
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
    <style>

        .right_col,
        .carousel,
        .item,
        .active,
        .carousel-inner {
            height: 90%;
        }

        .fill {
            width: 100%;
            height: 90%;
            background-position: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        .carousel-control.left, .carousel-control.right {
            background: none !important;
            outline: 0;
        }

    </style>
@endpush

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">

            <header id="myCarousel" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <!-- Set the first background image using inline CSS below. -->
                        {{--<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>--}}
                        <div class="fill">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs', array('chart_label' => 'In Progress', 'chart_id' => 'canvasDoughnutCountIssues1'))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs', array('chart_label' => 'Resolved', 'chart_id' => 'canvasDoughnutCountIssues2'))
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs', array('chart_label' => 'New', 'chart_id' => 'canvasDoughnutCountIssues3'))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs', array('chart_label' => 'Closed', 'chart_id' => 'canvasDoughnutCountIssues4'))
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs3', array('chart_label' => 'TEST2', 'chart_id' => 'donutchart2'))
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs', array('chart_label' => 'TEST2', 'chart_id' => 'donutchar1'))
                                </div>
                            </div>
                        </div>
                        <div class="carousel-caption">
                            {{--<h2>Caption 1</h2>--}}
                        </div>
                    </div>
                    <div class="item">
                        <!-- Set the second background image using inline CSS below. -->
                        {{--<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>--}}
                        <div class="fill">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs3', array('chart_label' => 'In Progress', 'chart_id' => 'canvasDoughnutCountIssues1'))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs3', array('chart_label' => 'Resolved', 'chart_id' => 'canvasDoughnutCountIssues2'))
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs3', array('chart_label' => 'New', 'chart_id' => 'canvasDoughnutCountIssues3'))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.chartjs3', array('chart_label' => 'Closed', 'chart_id' => 'canvasDoughnutCountIssues4'))
                                </div>
                            </div>
                        </div>
                        <div class="carousel-caption">
                            {{--<h2>Caption 2</h2>--}}
                        </div>
                    </div>
                    <div class="item">
                        <!-- Set the third background image using inline CSS below. -->
                        <div class="fill">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'Inprogress', 'table_id' => 'tableList1', 'issue_records' => $issues_inprogress))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'Resolved', 'table_id' => 'tableList2', 'issue_records' => $issues_resolved))
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'New', 'table_id' => 'tableList3', 'issue_records' => $issues_new))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'Closed', 'table_id' => 'tableList4', 'issue_records' => $issues_closed))
                                </div>
                            </div>
                        </div>
                        <div class="carousel-caption">
                            {{--<h2>Caption 3</h2>--}}
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>

            </header>

        </div>
    </div>
    <!-- /page content -->
@endsection