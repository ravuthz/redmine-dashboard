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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Inprogress</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($issues['issues'] as $issue)
                                    <tr>
                                        <td>{{ $issue['id']  }}</td>
                                        <td>{{ $issue['project']['name'] }}</td>
                                        <td>{{ $issue['subject']  }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Resolved</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Subject</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issues['issues'] as $issue)
                                <tr>
                                    <td>{{ $issue['id']  }}</td>
                                    <td>{{ $issue['project']['name'] }}</td>
                                    <td>{{ $issue['subject']  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>New</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Subject</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issues['issues'] as $issue)
                                <tr>
                                    <td>{{ $issue['id']  }}</td>
                                    <td>{{ $issue['project']['name'] }}</td>
                                    <td>{{ $issue['subject']  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Closed</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Subject</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issues['issues'] as $issue)
                                <tr>
                                    <td>{{ $issue['id']  }}</td>
                                    <td>{{ $issue['project']['name'] }}</td>
                                    <td>{{ $issue['subject']  }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
@endsection

@push('scripts')
<script src="{{ asset("js/all-datatable.min.js") }}"></script>
<script>
    jQuery.ready(function(){

//        $('#datatable').DataTable();

        // 'http://www.redmine.org/issues.json',
//        $.ajax({
//            url: 'http://192.168.1.92/issues.json',
//            type: 'GET',
//            crossDomain: true,
//            dataType: 'jsonp',
//            success: function() { alert("Success"); },
//            error: function() { alert('Failed!'); },
//            beforeSend: setHeader
//        });

//        $.ajax({
//            url: "http://www.redmine.org/issues.json",
//            dataType:"jsonp",
//            headers: {'X-Requested-With': 'XMLHttpRequest'},
//            success: function(res) {
//                console.log(res);
//            }
//        });


//        $.ajax({
//            url: "http://www.redmine.org/issues.json",
//            type: 'GET',
//            data: {},
//            beforeSend: function(xhr) {
//                xhr.setRequestHeader("Accept", "application/json");
//                xhr.setRequestHeader("Content-Type", "application/json");
//            },
//            success: function(res) {
//                console.log('res: ', res);
//            },
//            error: function(err) {
//                console.log('err: ', err);
//            }
//        });


//        $.ajax({
//            url: "http://www.redmine.org/issues.json",
//            type: "GET",
//            crossDomain: true,
//            data: JSON.stringify(somejson),
//            dataType: "json",
//            success: function (response) {
//                console.log(response);
//            },
//            error: function (xhr, status) {
//                alert("error");
//            }
//        });

    });

</script>
@endpush