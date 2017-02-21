@extends('layouts.blank')

@section('main_container')
        <!-- page content -->
<div class="right_col" role="main">
    <div class="responsive-height">

        <div class="row height-50p">
            <div class="col-md-6 col-sm-6 col-xs-12">
                @include('partials.table_list', array('title' => 'New Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue1', 'items' => $issues_new))
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                @include('partials.table_list', array('title' => 'In Progress Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue2', 'items' => $issues_inprogress))
            </div>
        </div>

        <div class="row height-50p">
            <div class="col-md-6 col-sm-6 col-xs-12">
                @include('partials.table_list', array('title' => 'Resolved Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue3', 'items' => $issues_resolved))
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                @include('partials.table_list', array('title' => 'Closed Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue4', 'items' => $issues_closed))
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection