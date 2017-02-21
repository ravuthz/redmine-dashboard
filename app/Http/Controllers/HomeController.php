<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\Http\Requests;
use App\Status;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->all_issues_statuses();
        $data['count'] = Issue::countByStatuses([1,2,3,5]);
        return view('home.index', $data);
    }

    public function slider(Request $request) {
        $data = $this->all_issues_status_updated_today();
        $data['counts'] = Issue::countPerProjectByStatuses([1,2,3,5]);
        return view('home.slider', $data);
    }

    public function list_issues_status()
    {
        $data = $this->all_issues_statuses();
        return view('home.list_issues_status', $data);
    }

    public function total_issue_list(Request $request) {
        $data = $this->all_issues_status_updated_today();
        return view('home.total_issue_list', $data);
    }

    public function total_issue_chart() {
        return view('home.total_issue_chart');
    }

    private function all_issues_statuses() {
        $data['issues_new'] = Issue::getByStatus(1);
        $data['issues_inprogress'] = Issue::getByStatus(2);
        $data['issues_resolved'] = Issue::getByStatus(3);
        $data['issues_closed'] = Issue::getByStatus(5);
        return $data;
    }

    private function all_issues_status_updated_today() {
        $data['issues_new'] = Issue::getByStatusAndUpdatedOn(1);
        $data['issues_inprogress'] = Issue::getByStatusAndUpdatedOn(2);
        $data['issues_resolved'] = Issue::getByStatusAndUpdatedOn(3);
        $data['issues_closed'] = Issue::getByStatusAndUpdatedOn(5);
        return $data;
    }
}
