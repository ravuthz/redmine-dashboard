@extends('layouts.blank')

@push('stylesheets')
    <style>
        /*.right_col,*/
        /*.carousel,*/
        /*.item,*/
        /*.active,*/
        /*.carousel-inner {*/
            /*height: 90%;*/
        /*}*/

        /*.fill {*/
            /*width: 100%;*/
            /*height: 90%;*/
            /*background-position: center;*/
            /*-webkit-background-size: cover;*/
            /*-moz-background-size: cover;*/
            /*background-size: cover;*/
            /*-o-background-size: cover;*/
        /*}*/

        /*.carousel-control.left, .carousel-control.right {*/
            /*background: none !important;*/
            /*outline: 0;*/
        /*}*/

        .carousel-inner .item {
            min-height: 720px;
            background-color: darkgray;
        }

    </style>
@endpush

@section('main_container')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row height-50p">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'Inprogress', 'table_id' => 'tableList1', 'issue_records' => $statuses[1]))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'Resolved', 'table_id' => 'tableList2', 'issue_records' => $statuses[2]))
                                </div>
                            </div>
                            <div class="row height-50p">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'New', 'table_id' => 'tableList3', 'issue_records' => $statuses[3]))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    @include('partials.issues_table', array('issue_label' => 'Closed', 'table_id' => 'tableList4', 'issue_records' => $statuses[5]))
                                </div>
                            </div>
                        </div>
                        <div class="item">
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
                        <div class="item">
                            <div class="row height-50p">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.table_list', array('title' => 'New Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue1', 'items' => $currently[1]))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.table_list', array('title' => 'In Progress Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue2', 'items' => $currently[2]))
                                </div>
                            </div>
                            <div class="row height-50p">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.table_list', array('title' => 'Resolved Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue3', 'items' => $currently[3]))
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    @include('partials.table_list', array('title' => 'Closed Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue4', 'items' => $currently[5]))
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>

    </div>
@endsection