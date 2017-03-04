<div class="responsive-height">
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-6">
            @include('partials.issues_table', array('issue_label' => 'New', 'table_id' => 'tableList1', 'issue_records' => $statuses[1]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            @include('partials.issues_table', array('issue_label' => 'Inprogress', 'table_id' => 'tableList2', 'issue_records' => $statuses[2]))
        </div>
    </div>
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-6">
            @include('partials.issues_table', array('issue_label' => 'QA Test', 'table_id' => 'tableList13', 'issue_records' => $statuses[13]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            @include('partials.issues_table', array('issue_label' => 'Waiting to deploy', 'table_id' => 'tableList14', 'issue_records' => $statuses[14]))
        </div>
    </div>
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-6">
            @include('partials.issues_table', array('issue_label' => 'Resolved', 'table_id' => 'tableList3', 'issue_records' => $statuses[3]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            @include('partials.issues_table', array('issue_label' => 'Closed', 'table_id' => 'tableList5', 'issue_records' => $statuses[5]))
        </div>
    </div>
</div>