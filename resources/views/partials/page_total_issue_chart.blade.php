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
        @include('partials.chartjs3', array('chart_label' => 'QA Test', 'chart_id' => 'canvasDoughnutCountIssues13'))
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        @include('partials.chartjs3', array('chart_label' => 'Waiting to deploy', 'chart_id' => 'canvasDoughnutCountIssues14'))
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        @include('partials.chartjs3', array('chart_label' => 'New', 'chart_id' => 'canvasDoughnutCountIssues3'))
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        @include('partials.chartjs3', array('chart_label' => 'Closed', 'chart_id' => 'canvasDoughnutCountIssues5'))
    </div>
</div>