@extends('layouts.blank')

@push('stylesheets')
    <style>
        /*.right_col,*/
        /*.carousel,*/
        /*.item,*/
        /*.active,*/
        /*.carousel-inner {*/
            /*height: 90%;*/
        /*}*/

        /*.fill {*/
            /*width: 100%;*/
            /*height: 90%;*/
            /*background-position: center;*/
            /*-webkit-background-size: cover;*/
            /*-moz-background-size: cover;*/
            /*background-size: cover;*/
            /*-o-background-size: cover;*/
        /*}*/

        /*.carousel-control.left, .carousel-control.right {*/
            /*background: none !important;*/
            /*outline: 0;*/
        /*}*/

        .carousel-inner .item {
            min-height: 720px;
        }

    </style>
@endpush

@section('main_container')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            @include('partials.page_total_issue_list')
                        </div>
                        <div class="item">
                            @include('partials.page_total_issue_chart')
                        </div>
                        <div class="item">
                            @include('partials.page_list_issues_status')
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>

    </div>
@endsection