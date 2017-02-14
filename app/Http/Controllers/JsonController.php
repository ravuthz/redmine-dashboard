<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function __construct() {
        $this->issue = new Issue();
    }

    public function issues(Request $request) {
        return $this->issue->getByStatus($request->status_id);
    }

    public function count_issues(Request $request) {
        $issue_filter = array();

        if ($request->has('status_id')) {
            $issue_filter['status_id'] = $request->status_id;
        }

        if ($request->has('updated_on')) {
            $issue_filter['updated_on'] = $request->updated_on;
        }

        return $this->issue->countPerProject($issue_filter);
    }

    public function count_issues_array(Request $request) {
        $issue_filter = array();

        if ($request->has('status_id')) {
            $issue_filter['status_id'] = $request->status_id;
        }

        return $this->issue->countPerProjectArray($issue_filter);
    }

    public function count_all_issues() {
        return $this->issue->countAllByStatus();
    }

    public function list_issues() {
        return $this->issue->listPerProject(2);
    }

    public function list_issues_array() {
        return $this->issue->listPerProjectArray();
    }

    public function get_issue_between(Request $request) {
        $sDate = $request->has('sdate') ? $request->sdate : null;
        $eDate = $request->has('edate') ? $request->edate : null;
        return $this->issue->getBetween($sDate, $eDate);
    }

}
