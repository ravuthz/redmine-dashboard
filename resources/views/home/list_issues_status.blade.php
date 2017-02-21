@extends('layouts.blank')

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">

        <div class="responsive-height">

            <div class="row height-50p">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    @include('partials.issues_table', array('issue_label' => 'Inprogress', 'table_id' => 'tableList1', 'issue_records' => $issues_inprogress))
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    @include('partials.issues_table', array('issue_label' => 'Resolved', 'table_id' => 'tableList2', 'issue_records' => $issues_resolved))
                </div>
            </div>

            <div class="row height-50p">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    @include('partials.issues_table', array('issue_label' => 'New', 'table_id' => 'tableList3', 'issue_records' => $issues_new))
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    @include('partials.issues_table', array('issue_label' => 'Closed', 'table_id' => 'tableList4', 'issue_records' => $issues_closed))
                </div>
            </div>

        </div>

    </div>
    <!-- /page content -->
@endsection