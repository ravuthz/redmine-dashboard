<div class="x_panel">
    <div class="x_title">
        <h2>{{ $chart_title }}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table id="{{ $chart_id }}" class="" style="width:100%">
            <tbody><tr>
                <th style="width:37%;">
                    <p>Top 5</p>
                </th>
                <th>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Device</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Progress</p>
                    </div>
                </th>
            </tr>
            <tr>
                <td>
                    <canvas id="{{ $chart_id  }}"></canvas>
                </td>
                <td>
                    <table class="tile_info">
                        <tbody><tr>
                            <td>
                                <p><i class="fa fa-square blue"></i>IOS </p>
                            </td>
                            <td>30%</td>
                        </tr>
                        <tr>
                            <td>
                                <p><i class="fa fa-square green"></i>Android </p>
                            </td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>
                                <p><i class="fa fa-square purple"></i>Blackberry </p>
                            </td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td>
                                <p><i class="fa fa-square aero"></i>Symbian </p>
                            </td>
                            <td>15%</td>
                        </tr>
                        <tr>
                            <td>
                                <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            </tbody></table>
    </div>
</div>