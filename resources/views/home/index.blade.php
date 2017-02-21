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
                <div class="col-md-12">
                    @component('components.xpanel')
                        @slot('title')
                            Transaction Summary
                            <small>Monthly progress</small>
                        @endslot
                        <div id="serialChart"></div>
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @component('components.xpanel')
                        @slot('title')
                            All Closed Issues
                            <small>Activity shares</small>
                        @endslot
                        <div id="closeIssueChart" style="height: 500px; width: 100%;"></div>
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @component('components.xpanel')
                        @slot('title')
                            All New Issues
                            <small>Activity shares</small>
                        @endslot
                        <div id="allIssuePieChart1" style="height: 500px; width: 100%;"></div>
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.xpanel')
                        @slot('title')
                            All New Issues
                            <small>Activity shares</small>
                        @endslot
                        <div id="allIssuePieChart2" style="height: 500px; width: 100%;"></div>
                    @endcomponent
                </div>
            </div>


        </div>
    </div>
@endsection