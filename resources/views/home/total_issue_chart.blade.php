@extends('layouts.blank')

@section('main_container')
    <div class="right_col" role="main">
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
@endsection