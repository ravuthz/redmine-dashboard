<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $status_ids = 0;

    public function __construct() {
        $this->status_ids = Status::pluck('id');
    }

    public function index()
    {
        $data['statuses'] = $this->all_issues_statuses();
        $data['count'] = Issue::countByStatuses([1,2,3,5]);
        return view('home.index', $data);
    }

    public function slider() {
        $data['statuses'] = $this->all_issues_statuses();
        $data['currently'] = $this->all_issues_status_updated_today();
        $data['counts'] = Issue::countPerProjectByStatuses($this->status_ids);
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
        $data = [];
        foreach($this->status_ids as $id) {
            $data[$id] = Issue::getByStatus($id);
        }
        return $data;
    }

    private function all_issues_status_updated_today() {
        $data = [];
        foreach($this->status_ids as $id) {
            $data[$id] = Issue::getByStatusAndUpdatedOn($id);
        }
        return $data;
    }
}
