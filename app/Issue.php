<?php

namespace App;

use App\Status;
use DB;

class Issue extends Model
{
    const MAX_ISSUE = 5;
    const MAX_LIST_ISSUE = 10;
    protected $today;

    public function __construct() {
        parent::__construct();
        $this->today = '2017-02-10'; // date('Y-m-d')
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function status()
    {
        return $this->belongsTo('App\Status')->select(['id', 'name']);
    }


    public function scopeGetByStatus($query, $status_id, $limit= 10) {
        return $query->where('status_id', $status_id)->limit($limit)->get();
    }

    public function scopeGetByStatusAndUpdatedOn($query, $status_id, $updated_on = NULL) {
        return $query
            ->where('status_id', $status_id)
            ->whereDate('updated_on', $updated_on ?: date('Y-m-d'))->get();
    }

    public function scopeGetPerProject($query, $status_id = 0, $updated_on = NULL) {
        if ($status_id) {
            $query->where('status_id', $status_id);
        }

        if ($updated_on) {
            $query->whereDate('updated_on', $updated_on);
        }

        return $query->get();
    }

    public function scopeGetFirstByStatus($query, $status_id) {
        return $query->where('status_id', $status_id)->first();
    }

    public function scopeCountByStatus($query, $status_id) {
        return $query->where('status_id', $status_id)->count();
    }

    public function scopeCountByStatuses($query, $status_ids) {
        $counts = array();
        foreach ($status_ids as $id) {
            $counts[$id] = $query->where('status_id', $id)->count();
        }
        return $counts;
    }

    public function scopeCountPerProjectByStatus($query, $status_id, $updated_on = NULL) {
        return $query->where('status_id', $status_id)->whereDate('updated_on', $updated_on ?: date('Y-m-d'))->count();
    }

    public function scopeCountBetween($query, $sdate = null, $edate = null) {
        $sdate = $sdate ?: '2016-01-01';
        $edate = $edate ?: '2017-12-31';

        $statuses = Status::pluck('id');

        $sqls = [];
        $sqls[] = 'updated_on, DATE_FORMAT(updated_on, "%Y-%m") as `date`, MONTH(updated_on) as `month`, YEAR(updated_on) as `year`';

        foreach ($statuses as $id) {
            $sqls[] = "(SELECT count(*) FROM issues WHERE status_id = $id AND DATE_FORMAT(updated_on, '%Y-%m') = DATE_FORMAT(p.updated_on, '%Y-%m') ) as `status_$id`";
        }

        $q = DB::table('issues as p')->selectRaw(implode(', ', $sqls));

        if ($sdate == $edate) {
            $q->whereDate('updated_on', $sdate);
        } else {
            $q->whereBetween('updated_on', [$sdate, $edate]);
        }

        return $q->groupby(DB::raw("MONTH(updated_on)"))
        ->orderby('updated_on', 'ASC')
        ->get();
    }

    public function scopeCountPerProjectByStatuses($query, $status_ids, $updated_on = NULL) {
        $counts = array();
        $date = $updated_on ?: date('Y-m-d');
        foreach ($status_ids as $id) {
            $counts[$id] = $query->where('status_id', $id)->whereDate('updated_on', $date)->count();
        }
        return $counts;
    }






    public function getBetween($startDate = '2017-01-01', $endDate = '2017-01-31') {
        return $this->client->issue->all([
            'status_id' => 5,
            'created_on' => ">=$startDate",
            'updated_on' => "<=$endDate"
        ]);
    }

    public function getInstance() {
        return $this->client->issue;
    }

    public function getStatus() {
        return $this->client->issue_status->listing();
    }

//    public function getByStatus($query, $status = 0) {
//        $issue_filter = array(
//            'sort' => 'desc',
//            'limit' => self::MAX_ISSUE
//        );
//
//        if ($status > 0) {
//            $issue_filter['status_id'] = $status;
//        }
//
//        $data = $this->client->issue->all($issue_filter);
//
//        return $data;
//    }

    public function countPerProject($issue_filter = array()) {
        $counts = array();
        $projects = $this->client->project->all();

        if (empty($projects)) {
            return 0;
        }

        foreach ($projects['projects'] as $project) {
            if (array_key_exists('parent', $project) == FALSE) {
                $temp['id'] = $project['id'];
                $temp['name'] = $project['name'];
                $temp['identifier'] = $project['identifier'];

                $issue_filter['project_id'] = $project['id'];

                $temp['number'] = $this->client->issue->all($issue_filter)['total_count'];
                $counts[] = $temp;
            }
        }
        return $counts;
    }

    public function countPerProjectArray($issue_filter = array()) {
        $name = array();
        $number = array();
        $projects = $this->client->project->all();

//        if ($request->has('status_id')) {
//            $issue_filter['status_id'] = $request->status_id;
//        }

        if (empty($projects)) {
            return array(
                'name' => array(),
                'number' => array()
            );
        }

        foreach ($projects['projects'] as $project) {
            if (array_key_exists('parent', $project) == FALSE) {
                $name[] = $project['name'];

                $issue_filter['project_id'] = $project['id'];

                $number[] = $this->client->issue->all($issue_filter)['total_count'];
            }
        }

        return array(
            'name' => $name,
            'number' => $number
        );
    }

    public function countPerProjectObject($issue_filter = array()) {
        $counts = array();

        $projects = $this->client->project->all();

        if (empty($projects)) {
            return null;
        }

        foreach ($projects['projects'] as $project) {
            if (array_key_exists('parent', $project) == FALSE) {
                $issue_filter['project_id'] = $project['id'];

                $counts[] = array(
                    'name' => $project['name'],
                    'number' => $this->client->issue->all($issue_filter)['total_count']
                );

            }
        }

        return $counts;
    }

    public function countAllByStatus() {
        $counts = array();

        $statuses = $this->client->issue_status->listing();

        if (count($statuses) > 0) {
            foreach ($statuses as $key => $val) {
                $counts[$val] = $this->client->issue->all(['status_id' => $val])['total_count'];
            }
        }

        return $counts;
    }

    public function listPerProject($status = 0, $updated_on = null) {
        $issue_filter = array();

        if ($status > 0) {
            $issue_filter['status_id'] = $status;
        }

        if ($updated_on != null) {
            $issue_filter['updated_on'] = '=' . $updated_on;
        } else {
            $issue_filter['updated_on'] = '=' . $this->today;
        }

        $issue_filter['limit'] = self::MAX_LIST_ISSUE;

        return $this->client->issue->all($issue_filter);
    }


}
