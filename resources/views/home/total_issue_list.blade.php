@extends('layouts.blank')

@push('stylesheets')
        <!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')
        <!-- page content -->
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'New Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue1', 'items' => $issues_new))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'In Progress Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue2', 'items' => $issues_inprogress))
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Resolved Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue3', 'items' => $issues_resolved))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Closed Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue4', 'items' => $issues_closed))
        </div>
    </div>

</div>
<!-- /page content -->
@endsection

@push('scripts')
<script src="{{ asset("js/Chart.min.js") }}"></script>
<script>
    $(function() {
        refreshData();

        setInterval(function(){
            refreshData()
        }, 300000);

        function table(selector, items) {
            var tags = [];

            $.each(items, function(i,e) {
                tags.push('<tr><td>' + e.name +  '</td>');
                tags.push('<td class="fs15 fw700 text-right">' + e.number + '</td></tr>');
            });

            $(selector).html(tags.join(''));
        }

        function refreshData() {
            console.log('Refresh data on ' + new Date());

            $.get('json/count_issues?status_id=1&updated_on=2017-02-10', function(res) {
                table('#tableIssue1', res);
            });

            $.get('json/count_issues?status_id=2&updated_on=2017-02-10', function(res) {
                table('#tableIssue2', res);
            });

            $.get('json/count_issues?status_id=3&updated_on=2017-02-10', function(res) {
                table('#tableIssue3', res);
            });

            $.get('json/count_issues?status_id=5&updated_on=2017-02-10', function(res) {
                table('#tableIssue4', res);
            });
        }

    });
</script>
@endpush