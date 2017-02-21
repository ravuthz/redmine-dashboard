@extends('layouts.blank')

@section('main_container')
    <div class="right_col" role="main">
        <div class="responsive-height">
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
@endsection