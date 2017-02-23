<div class="responsive-height">
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'New Issues', 'subtitle' => 'Project', 'table_id' => 'tableIssue1', 'items' => $count_issue_via_status[1]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'In Progress Issues', 'subtitle' => 'Project', 'table_id' => 'tableIssue2', 'items' => $count_issue_via_status[2]))
        </div>
    </div>
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'QA Test Issues', 'subtitle' => 'Project', 'table_id' => 'tableIssue13', 'items' => $count_issue_via_status[13]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Wait to deploy Issues', 'subtitle' => 'Project', 'table_id' => 'tableIssue14', 'items' => $count_issue_via_status[14]))
        </div>
    </div>
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Resolved Issues', 'subtitle' => 'Project', 'table_id' => 'tableIssue3', 'items' => $count_issue_via_status[3]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Closed Issues', 'subtitle' => 'Project', 'table_id' => 'tableIssue5', 'items' => $count_issue_via_status[5]))
        </div>
    </div>
</div>