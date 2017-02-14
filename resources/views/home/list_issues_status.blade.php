@extends('layouts.blank')

@push('stylesheets')
        <!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">

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
    <!-- /page content -->
@endsection

@push('scripts')
<script src="{{ asset("js/all-datatable.min.js") }}"></script>
<script>

    $(function() {
        refreshData();

        setInterval(function(){
            refreshData()
        }, 300000);

        function table(selector, items) {
            var tags = [];

            $.each(items.issues, function(i,e) {
                tags.push('<tr><td>' + e.id +  '</td>');
                tags.push('<td>' + e.project.name  + '</td>');
                tags.push('<td>' + e.subject + '</td></tr>');
            });

            $(selector + 'tbody').html(tags.join(''));
        }

        function refreshData() {
            console.log('Refresh data on ' + new Date());

            $.get('json/issues?status_id=1', function(res) {
                table('#tableList1', res);
            });

            $.get('json/issues?status_id=2', function(res) {
                table('#tableList2', res);
            });

            $.get('json/issues?status_id=3', function(res) {
                table('#tableList3', res);
            });

            $.get('json/issues?status_id=5', function(res) {
                table('#tableList4', res);
            });
        }

    });

</script>
@endpush