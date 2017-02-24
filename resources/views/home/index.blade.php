@extends('layouts.blank')

@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="row top_tiles">
                @include('partials.dash_box', [
                    'title' => 'New',
                    'content' => 'The issues created recently',
                    'icon' => 'fa fa-caret-square-o-right',
                    'count' => $count[1],
                    'id' => 'countNewIssues'
                ])

                @include('partials.dash_box', [
                    'title' => 'In Progress',
                    'content' => 'The issues are fixing',
                    'icon' => 'fa fa-comments-o',
                    'count' => $count[2],
                    'id' => 'countInProgressIssues'
                ])

                @include('partials.dash_box', [
                    'title' => 'Resolved',
                    'content' => 'The issues are fixed and wait to testing',
                    'icon' => 'fa fa-sort-amount-desc',
                    'count' => $count[3],
                    'id' => 'countResolvedIssues'
                ])

                @include('partials.dash_box', [
                    'title' => 'Closed',
                    'content' => 'The issues are tested, wait to deploy',
                    'icon' => 'fa fa-check-square-o',
                    'count' => $count[5],
                    'id' => 'countClosedIssues'
                ])
            </div>

            <div class="row">
                @component('components.xpanel-no-header', ['col' => 'col-md-12'])
                    @slot('title')
                        <h2>Transaction Summary
                            <small>Monthly progress</small>
                        </h2>
                        <div class="filter">
                            <div id="reportRange1" class="pull-right1" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>January 1st 2016 - December 31th 2017</span> <b class="caret"></b>
                            </div>
                        </div>
                    @endslot
                    <div id="serialChart"></div>
                @endcomponent
            </div>

            <div class="row">
                @component('components.xpanel-in-col', ['col' => 'col-md-12'])
                    @slot('title')
                        All Closed Issues
                        <small>Activity shares</small>
                    @endslot
                    <div id="closeIssueChart" class="home-md-box"></div>
                @endcomponent
            </div>

            <div class="row">
                @component('components.xpanel-in-col', ['col' => 'col-md-6'])
                    @slot('title')
                        All New Issues
                        <small>Activity shares</small>
                    @endslot
                    <div id="allIssuePieChart1" class="home-md-box"></div>
                @endcomponent

                @component('components.xpanel-in-col', ['col' => 'col-md-6'])
                    @slot('title')
                        All Closed Issues
                        <small>Activity shares</small>
                    @endslot
                    <div id="allIssuePieChart5" class="home-md-box"></div>
                @endcomponent
            </div>

            <div class="row">
                @component('components.xpanel-in-col', ['col' => 'col-md-6'])
                    @slot('title')
                        All QA Test Issues
                        <small>Activity shares</small>
                    @endslot
                    <div id="allIssuePieChart13" class="home-md-box"></div>
                @endcomponent

                @component('components.xpanel-in-col', ['col' => 'col-md-6'])
                    @slot('title')
                        All Waiting to Deploy Issues
                        <small>Activity shares</small>
                    @endslot
                    <div id="allIssuePieChart14" classs="home-md-box"></div>
                @endcomponent
            </div>

        </div>
    </div>
@endsection