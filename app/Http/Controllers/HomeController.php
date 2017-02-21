<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['statuses'] = $this->all_issues_statuses();
        $data['count'] = Issue::countByStatuses([1,2,3,5]);
        return view('home.index', $data);
    }

    public function slider() {
        $data['statuses'] = $this->all_issues_statuses();
        $data['currently'] = $this->all_issues_status_updated_today();
        $data['counts'] = Issue::countPerProjectByStatuses([1,2,3,5]);
        return view('home.slider', $data);
    }

    public function list_issues_status()
    {
        $data['statuses'] = $this->all_issues_statuses();
        return view('home.list_issues_status', $data);
    }

    public function total_issue_list() {
        $data['currently'] = $this->all_issues_status_updated_today();
        return view('home.total_issue_list', $data);
    }

    public function total_issue_chart() {
        return view('home.total_issue_chart');
    }

    private function all_issues_statuses() {
        $data[1] = Issue::getByStatus(1);
        $data[2] = Issue::getByStatus(2);
        $data[3] = Issue::getByStatus(3);
        $data[5] = Issue::getByStatus(5);
        return $data;
    }

    private function all_issues_status_updated_today() {
        $data[1] = Issue::getByStatusAndUpdatedOn(1);
        $data[2] = Issue::getByStatusAndUpdatedOn(2);
        $data[3] = Issue::getByStatusAndUpdatedOn(3);
        $data[5] = Issue::getByStatusAndUpdatedOn(5);
        return $data;
    }
}
