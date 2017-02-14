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
            @include('partials.chartjs', array('chart_label' => 'In Progress', 'chart_id' => 'canvasDoughnutCountIssues1'))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.chartjs', array('chart_label' => 'Resolved', 'chart_id' => 'canvasDoughnutCountIssues2'))
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.chartjs', array('chart_label' => 'New', 'chart_id' => 'canvasDoughnutCountIssues3'))
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.chartjs', array('chart_label' => 'Closed', 'chart_id' => 'canvasDoughnutCountIssues4'))
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.chartjs3', array('chart_label' => 'TEST2', 'chart_id' => 'donutchart2'))
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            @include('partials.chartjs', array('chart_label' => 'TEST2', 'chart_id' => 'donutchar1'))
        </div>
    </div>



</div>
<!-- /page content -->
@endsection

@push('scripts')

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script src="{{ asset("js/Chart.min.js") }}"></script>
{{--<scritp src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></scritp>--}}

<script>
    var colors1 = ["#455C73", "#9B59B6", "#BDC3C7", "#26B99A", "#3498DB"];
    var colors2 = ["#34495E", "#B370CF", "#CFD4D8", "#36CAAB", "#49A9EA"];

    var MALE_BAR_COLOUR = 'rgba(0, 51, 78, 0.3)';
    var MALE_BAR_ACTIVE_COLOUR = 'rgba(0, 51, 78, 1)';
    var FEMALE_BAR_COLOUR = 'rgba(248, 142, 40, 0.3)';
    var FEMALE_BAR_ACTIVE_COLOUR = 'rgba(248, 142, 40, 1)';


    $(function () {

        refreshData();

        setInterval(function () {
            refreshData()
        }, 300000);

        function chart(id, data, label, colors1, colors2) {
            if ($('#' + id).length) {
                var ctx = document.getElementById(id);
                var canvasDoughnut = new Chart(ctx, {
                    type: 'pie', // 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            data: data,
                            backgroundColor: colors1,
                            hoverBackgroundColor: colors2
                        }]
                    },
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    options: {
                        legend: true,
                        response: true,
//                        showTooltips: false,
//                        onAnimationProgress: drawSegmentValues
                    }
                });
            }
        }

        function drawSegmentValues() {
            for(var i=0; i<myPieChart.segments.length; i++)
            {
                ctx.fillStyle="white";
                var textSize = canvas.width/10;
                ctx.font= textSize+"px Verdana";
                // Get needed variables
                var value = myPieChart.segments[i].value;
                var startAngle = myPieChart.segments[i].startAngle;
                var endAngle = myPieChart.segments[i].endAngle;
                var middleAngle = startAngle + ((endAngle - startAngle)/2);

                // Compute text location
                var posX = (radius/2) * Math.cos(middleAngle) + midX;
                var posY = (radius/2) * Math.sin(middleAngle) + midY;

                // Text offside by middle
                var w_offset = ctx.measureText(value).width/2;
                var h_offset = textSize/4;

                ctx.fillText(value, posX - w_offset, posY + h_offset);
            }
        }

        function chart2(id, data) {
            var canvas = document.getElementById(id);
            var ctx = canvas.getContext("2d");
            var midX = canvas.width/2;
            var midY = canvas.height/2
            var totalValue = getTotalValue(data);

            var myPieChart = new Chart(ctx).Pie(data, {
                showTooltips: false,
                onAnimationProgress: drawSegmentValues
            });

            var radius = myPieChart.outerRadius;

            function drawSegmentValues()
            {
                for(var i=0; i<myPieChart.segments.length; i++)
                {
                    ctx.fillStyle="white";
                    var textSize = canvas.width/10;
                    ctx.font= textSize+"px Verdana";
                    // Get needed variables
                    var value = Math.floor(myPieChart.segments[i].value/totalValue*100)+'%';
                    var startAngle = myPieChart.segments[i].startAngle;
                    var endAngle = myPieChart.segments[i].endAngle;
                    var middleAngle = startAngle + ((endAngle - startAngle)/2);

                    // Compute text location
                    var posX = (radius/2) * Math.cos(middleAngle) + midX;
                    var posY = (radius/2) * Math.sin(middleAngle) + midY;

                    // Text offside by middle
                    var w_offset = ctx.measureText(value).width/2;
                    var h_offset = textSize/4;

                    ctx.fillText(value, posX - w_offset, posY + h_offset);
                }
            }

            function getTotalValue(arr) {
                var total = 0;
                for(var i=0; i<arr.length; i++)
                    total += arr[i].value;
                return total;
            }

        }
//
        function refreshData() {
            console.log('Refresh data on ' + new Date());
            $.get('json/count_issues_array?status_id=1', function (res) {
                chart('canvasDoughnutCountIssues1', res.number, res.name, colors1, colors2);
            });

            $.get('json/count_issues_array?status_id=2', function (res) {
                chart('canvasDoughnutCountIssues2', res.number, res.name, colors1, colors2);
            });

            $.get('json/count_issues_array?status_id=3', function (res) {
                chart('canvasDoughnutCountIssues3', res.number, res.name, colors1, colors2);
            });

            $.get('json/count_issues_array?status_id=5', function (res) {
                chart('canvasDoughnutCountIssues4', res.number, res.name, colors1, colors2);
            });

            $.get('json/count_issues_array?status_id=5', function (res) {
                chart('canvasDoughnut', res.number, res.name, colors1, colors2);
            });



            var data1 = [
                {
                    value: 300,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Red"
                },
                {
                    value: 50,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Green"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Yellow"
                }
            ];

            chart2("donutchar1", data1);
        }

    });



    var chart = AmCharts.makeChart( "chartdiv", {
        "type": "pie",
        "theme": "light",
        "dataProvider": [ {
            "country": "Lithuania",
            "value": 260
        }, {
            "country": "Ireland",
            "value": 201
        }, {
            "country": "Germany",
            "value": 65
        }, {
            "country": "Australia",
            "value": 39
        }, {
            "country": "UK",
            "value": 19
        }, {
            "country": "Latvia",
            "value": 10
        } ],
        "valueField": "value",
        "titleField": "country",
        "outlineAlpha": 0.7 ,
        "depth3D": 25,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 30,
        "export": {
            "enabled": false
        }
    } );






</script>
@endpush