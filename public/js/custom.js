(function($,sr){
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    };

    // smartresize
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');

var colors1 = [
    "#455C73",
    "#9B59B6",
    "#BDC3C7",
    "#26B99A",
    "#3498DB"
];

var colors2 = [
    "#34495E",
    "#B370CF",
    "#CFD4D8",
    "#36CAAB",
    "#49A9EA"
];

var backgroundColor = [
    "#BDC3C7",
    "#9B59B6",
    "#E74C3C",
    "#26B99A",
    "#3498DB"
];

var hoverBackgroundColor = [
    "#CFD4D8",
    "#B370CF",
    "#E95E4F",
    "#36CAAB",
    "#49A9EA"
];

var statuses = {
    "1": "New",
    "2": "In Progress",
    "3": "Resolved",
    "5": "Closed",
    "13": "QA test",
    "14": "waiting deployment"
};

var refreshTime = 30000; // 30 seconds
var slideTime = 7000; // 7 seconds


function am_chart(id, data, valueField, titleField) {
    var chart = AmCharts.makeChart(id, {
        "type": "pie",
        "theme": "light",
        "dataProvider": data,
        "valueField": valueField,
        "titleField": titleField,
        "outlineAlpha": 0.7 ,
        "marginBottom": 0,
        "marginTop": 0,
        "depth3D": 25,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "labelText": "[[title]] ( [[value]] )",
        "angle": 30,
        "export": {
            "enabled": false
        }
    });
}

function pie_chart(id, data) {
    var chart = AmCharts.makeChart(id, {
        "type": "pie",
        "startDuration": 0,
        "theme": "light",
        "addClassNames": true,
        "innerRadius": "10%",
        "defs": {
            "filter": [{
                "id": "shadow",
                "width": "200%",
                "height": "200%",
                "feOffset": {
                    "result": "offOut",
                    "in": "SourceAlpha",
                    "dx": 0,
                    "dy": 0
                },
                "feGaussianBlur": {
                    "result": "blurOut",
                    "in": "offOut",
                    "stdDeviation": 5
                },
                "feBlend": {
                    "in": "SourceGraphic",
                    "in2": "blurOut",
                    "mode": "normal"
                }
            }]
        },
        "dataProvider": data,
        "valueField": "issues_count",
        "titleField": "name",
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "labelText": "[[title]] ( [[value]] )",
        "export": {
            "enabled": false
        }
    });
}

function serial_chart(id, data) {
    var style = "vertical-align:bottom; margin-right: 10px; width:27px; height:27px;'><span style='font-size:14px; color:#000000;";
    var graphs = [];
    $.each(statuses, function(i,e) {
        graphs.push({
            id: 'g' + i,
            type: 'column',
            title: e,
            valueField: 'status_' + i,
            bullet: 'round',
            lineAlpha: 0,
            fillAlphas: 0.6,
            balloonText: '<b>[[value]]</b>'
            //"balloonText": "<img src='logo/list_5.png' style='" + style + "'><b>[[value]]</b></span>"
        });
    });

    var chart = AmCharts.makeChart(id, {
        "type": "serial",
        "dataProvider": data,
        "rotate": false,
        "marginTop": 10,
        "categoryField": "date",
        "categoryAxis": {
            "gridAlpha": 0.07,
            "axisColor": "#DADADA",
            "startOnAxis": false,
            "title": "Year",
            "guides": [{
                "category": "2001",
                "lineColor": "#CC0000",
                "lineAlpha": 1,
                "dashLength": 2,
                "inside": true,
                "labelRotation": 90,
                "label": "fines for speeding increased"
            }, {
                "category": "2007",
                "lineColor": "#CC0000",
                "lineAlpha": 1,
                "dashLength": 2,
                "inside": true,
                "labelRotation": 90,
                "label": "motorcycle fee introduced"
            }]
        },
        "valueAxes": [{
            "stackType": "regular",
            "gridAlpha": 0.07,
            "title": "Traffic incidents"
        }],
        "graphs": graphs,
        "legend": {
            "position": "bottom",
            "valueText": "[[value]]",
            "valueWidth": 100,
            "valueAlign": "left",
            "equalWidths": false,
            "periodValueText": "total: [[value.sum]]"
        },
        "chartCursor": {
            "cursorAlpha": 0
        },
        "chartScrollbar": {
            "color": "FFFFFF"
        },
        "responsive": {
            "enabled": true
        }
    });
}

function serial_chart_cirlcle(id, data) {
    var chart = AmCharts.makeChart(id, {
        "theme": "light",
        "type": "serial",
        "startDuration": 2,
        "dataProvider": data,
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "colorField": "color",
            "fillAlphas": 0.85,
            "lineAlpha": 0.1,
            "type": "column",
            "topRadius":0.72,
            "valueField": "number"
        }],
        "depth3D": 45,
        "angle": 27,
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "name",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha":0,
            "gridAlpha":0

        },
        "export": {
            "enabled": false
        }

    }, 0);
}

function table_issue_status(selector, items) {
    var tags = [];

    $.each(items.issues, function(i,e) {
        tags.push('<tr><td>' + e.id +  '</td>');
        tags.push('<td>' + e.project.name  + '</td>');
        tags.push('<td>' + e.subject + '</td></tr>');
    });

    $(selector + 'tbody').html(tags.join(''));
}

function table_issue_list(selector, items) {
    var tags = [];

    $.each(items, function(i,e) {
        tags.push('<tr><td>' + e.name +  '</td>');
        tags.push('<td class="fs15 fw700 text-right">' + e.issues_count + '</td></tr>');
    });

    $(selector + ' tbody').html(tags.join(''));
}

function count_issue_monthly(sdate, edate) {
    if ($('#serialChart').length) {
        $.get('json/count_issue_monthly?sdate=' + sdate + '&edate=' + edate, function(res) {
            console.log('res: ', res);
            serial_chart('serialChart', res);
        });
    }
}


function total_issue_chart_item(id, params) {
    console.log('total_issue_chart_item call with ', id, params);
    if ($('#' + id).length) {
        $.get('json/count_issues' + params, function (res) {
            am_chart(id, res, 'issues_count', 'name');
        });
    }
}

//TODO Done total_issue_chart
function total_issue_chart() {
    var params = "?updated_on=2017-02-09&";
    total_issue_chart_item('canvasDoughnutCountIssues1', params + 'status_id=1');
    total_issue_chart_item('canvasDoughnutCountIssues2', params + 'status_id=2');
    total_issue_chart_item('canvasDoughnutCountIssues13', params + 'status_id=13');
    total_issue_chart_item('canvasDoughnutCountIssues14', params + 'status_id=14');
    total_issue_chart_item('canvasDoughnutCountIssues3', params + 'status_id=3');
    total_issue_chart_item('canvasDoughnutCountIssues5', params + 'status_id=5');
}


function total_issue_list_item(selector, params) {
    console.log('total_issue_list call with ', selector, params);
    if ($(selector).length) {
        $.get('json/count_issue_all_statuses' + params, function(res) {
            table_issue_list(selector, res);
        });
    }
}

//TODO Done total_issue_list
function total_issue_list() {
    var params = '?main_project=true&';
    total_issue_list_item('#tableIssue1', params + 'status_id=1');
    total_issue_list_item('#tableIssue2', params + 'status_id=2');
    total_issue_list_item('#tableIssue13', params + 'status_id=13');
    total_issue_list_item('#tableIssue14', params + 'status_id=14');
    total_issue_list_item('#tableIssue3', params + 'status_id=3');
    total_issue_list_item('#tableIssue5', params + 'status_id=5');
}


function list_issues_status_item(selector, params) {
    console.log('list_issues_status_item call with ', selector, params);
    if ($(selector).length) {
        $.get('json/issues' + params, function(res) {
            table_issue_status(selector, res);
        });
    }
}

//TODO Done list_issues_status
function list_issues_status() {
    list_issues_status_item('#tableList1', '?status_id=1');
    list_issues_status_item('#tableList2', '?status_id=2');
    list_issues_status_item('#tableList13', '?status_id=13');
    list_issues_status_item('#tableList14', '?status_id=14');
    list_issues_status_item('#tableList3', '?status_id=3');
    list_issues_status_item('#tableList5', '?status_id=5');
}

function home_page_pie_chart(id, params) {
    console.log('home_page_pie_chart with ', id, params);
    if ($('#' + id).length) {
        $.get('json/count_issues' + params, function(res) {
            console.log('home_page_pie_chart ' + id + ' => ', res);
            pie_chart(id, res);
        });
    }
}

//TODO dashboard
function home_page() {
    count_issue_monthly('2016-01-01', '2017-12-31');

    $('#reportRange1 span').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        startDate: '2016-01-01',
        endDate: '2017-12-31',
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, function(sdate, edate, label) {
        $('#reportRange1 span').text(sdate.format('MMMM Do YYYY') + ' - ' + edate.format('MMMM Do YYYY'));
        count_issue_monthly(sdate.format('YYYY-MM-DD'), edate.format('YYYY-MM-DD'));
    });

    if ($('#closeIssueChart').length) {
        $.get('json/count_issues?status_id=5&colors=true', function(res) {
            serial_chart_cirlcle('closeIssueChart', res);
        });
    }

    home_page_pie_chart('allIssuePieChart1', '?status_id=1');
    home_page_pie_chart('allIssuePieChart5', '?status_id=5');
    home_page_pie_chart('allIssuePieChart13', '?status_id=13');
    home_page_pie_chart('allIssuePieChart14', '?status_id=14');


         // countIssueStatus1
        $.get('json/count_issue_all_statuses', function(res) {
            $.each(res, function(i,e) {
                if ($('#countIssueStatus' + i).length) {
                    $('#countIssueStatus' + i + ' count').text(e.issues_count);
                }
            });
        });

}

function refreshData() {
    console.clear();
    console.info('Data loaded at ', new Date());

    init_chart_doughnut();

    total_issue_chart();
    total_issue_list();
    list_issues_status();

    home_page();
}

/* ONLOAD EVENT */

$(function () {
    $('.carousel').carousel({
        interval: slideTime,
        pause: "hover"
    });

    refreshData();

    setInterval(function(){
        refreshData()
    }, refreshTime);
});

function init_chart_doughnut(){
    if( typeof (Chart) === 'undefined'){ return; }
    console.log('init_chart_doughnut');
    if ($('.canvasDoughnut').length){
        var chart_doughnut_settings = {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: {
                labels: [
                    "Symbian",
                    "Blackberry",
                    "Other",
                    "Android",
                    "IOS"
                ],
                datasets: [{
                    data: [15, 20, 30, 10, 30],
                    backgroundColor: backgroundColor,
                    hoverBackgroundColor: hoverBackgroundColor
                }]
            },
            options: {
                legend: false,
                responsive: false
            }
        };

        $('.canvasDoughnut').each(function(){
            var chart_element = $(this);
            var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);
        });
    }
}
