<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JsonController extends Controller
{
    public function __construct() {
        $this->issue = new Issue();
    }

    public function issues(Request $request) {
        return Issue::getByStatus($request->status_id);
    }

    public function count_issue_all_statuses(Request $request) {
        if ($request->has('main_project')) {
            return Project::parentCountIssueStatuses($request->status_id);
        }
        return Status::withCountIssues();
    }



    public function count_issues(Request $request) {
        if ($request->colors) {
            $colors = [
                '#FF0F00', '#FF6600', '#FF9E01',
                '#FCD202', '#F8FF01', '#B0DE09',
                '#04D215', '#04D215', '#0D52D1',
                '#2A0CD0', '#8A0CCF', '#CD0D74',
                '#754DEB', '#DDDDDD', '#333333'
            ];

            $count_with_colors = [];

            $data = Project::countIssueOnParent($request->status_id, $request->updated_on);
            foreach($data as $each) {
                $temp = $each;
                $temp['color'] = $colors[rand(0, count($colors)-1)];
                $count_with_colors[] = $temp;
            }
            return $count_with_colors;
        }
        return Project::withCountIssueStatus($request->status_id);
    }

    public function count_issues_array(Request $request) {
        return Project::countAllIssuesArray($request->status_id, $request->updated_on ?: date('Y-m-d'));
    }

    public function count_all_issues() {
        return Status::countAllIssues();
    }



    public function list_issues(Request $request) {
        return Issue::getPerProject($request->status_id, $request->updated_on);
//        return $this->issue->listPerProject(2);
    }

    public function get_issue_between(Request $request) {
        $sDate = $request->has('sdate') ? $request->sdate : Carbon::yesterday();
        $eDate = $request->has('edate') ? $request->edate : Carbon::today();

        if ($sDate == $eDate) {
            return Issue::whereDate('updated_on', $sDate)->get();
        }

        return Issue::whereDate('updated_on', '>=', $sDate)->whereDate('updated_on', '<=', $eDate)->get();
    }

    public function count_issue_monthly(Request $request) {
        return Issue::countBetween($request->sdate, $request->edate);
    }

}
