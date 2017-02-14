<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
        $this->issue = new Issue();
    }

    public function index()
    {
        $data['status'] = $this->issue->getStatus();

        $data['issues_new'] = $this->issue->getByStatus(1);

        $data['issues_inprogress'] = $this->issue->getByStatus(2);

        $data['issues_resolved'] = $this->issue->getByStatus(3);

        $data['issues_closed'] = $this->issue->getByStatus(5);

        $data['count'] = $this->issue->countAllByStatus();

        $data['test'] = $this->issue->getInstance()->all([
            'status_id' => 5,
            'created_on' => '>=2017-01-01',
            'updated_on' => '<=2017-01-31'
        ]);

        return view('home.index', $data);
    }

    public function list_issues_status()
    {
        $data['status'] = $this->issue->getStatus();

        $data['issues_new'] = $this->issue->getByStatus(1);

        $data['issues_inprogress'] = $this->issue->getByStatus(2);

        $data['issues_resolved'] = $this->issue->getByStatus(3);

        $data['issues_closed'] = $this->issue->getByStatus(5);

        return view('home.list_issues_status', $data);
    }

    public function total_issue_list(Request $request) {
        $today = date('Y-m-d');

        if ($request->has('updated_on')) {
            $today = $request->updated_on;
        }

        $data['issues_new'] = $this->issue->countPerProject(array(
            'status_id' => 1,
            'updated_on' => $today
        ));

        $data['issues_inprogress'] = $this->issue->countPerProject(array(
            'status_id' => 2,
            'updated_on' => $today
        ));

        $data['issues_resolved'] = $this->issue->countPerProject(array(
            'status_id' => 3,
            'updated_on' => $today
        ));

        $data['issues_closed'] = $this->issue->countPerProject(array(
            'status_id' => 5,
            'updated_on' => $today
        ));

        return view('home.total_issue_list', $data);
    }

    public function total_issue_chart() {
        return view('home.total_issue_chart');
    }
}
