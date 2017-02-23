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
            @include('partials.table_list', array('title' => 'QA Test Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue13', 'items' => $currently[13]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Wait to deploy Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue14', 'items' => $currently[14]))
        </div>
    </div>
    <div class="row height-50p">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Resolved Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue3', 'items' => $currently[3]))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.table_list', array('title' => 'Closed Issues Today', 'subtitle' => 'Project', 'table_id' => 'tableIssue5', 'items' => $currently[5]))
        </div>
    </div>
</div>