<?php

namespace App;

class Project extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }

    public function scopeWithChildren($query, $id) {
        return $query->with('issues')->where('id', $id)->orWhere('parent_id', $id)->get();
    }

    public function scopeCountIssueOnParent($query, $status_id, $updated_on = NULL) {
        $counts = array();
        $projects = $query->with('issues')->where('parent_id', null)->get();
        foreach ($projects as $project) {
            $ids = $project->where('parent_id', $project->id)->pluck('id');
            $ids[] = $project->id;

            $count = Issue::where('status_id', $status_id)->whereIn('project_id', $ids);

            if ($updated_on) {
                $count->whereDate('updated_on', $updated_on);
            }

            $counts[] = array(
                'id' => $project->id,
                'name' => $project->name,
                'identifier' => $project->identifier,
                'number' => $count->count()
            );
        }
        return $counts;
    }

    public function scopeCountAllIssues($query, $status_id, $updated_on = NULL) {
        $counts = array();
        $projects = $query->with('issues')->get();
        foreach ($projects as $project) {
            $ids = $project->where('parent_id', $project->id)->pluck('id');
            $ids[] = $project->id;

            $count = Issue::where('status_id', $status_id)->whereIn('project_id', $ids);

            if ($updated_on) {
                $count->whereDate('updated_on', $updated_on);
            }

            $counts[] = array(
                'id' => $project->id,
                'name' => $project->name,
                'identifier' => $project->identifier,
                'number' => $count->count()
            );
        }
        return $counts;
    }

    public function scopeCountAllIssuesArray($query, $status_id, $updated_on) {
        $counts = $query->countAllIssues($status_id, $updated_on);

        $temp = array();
        foreach ($counts as $count) {

            $temp['name'][] = $count['name'];
            $temp['number'][] = $count['number'];
        }
        return $temp;
    }


    // withCountIssueStatus
    protected $selectFields = ['id', 'name', 'parent_id', 'created_on','updated_on'];
    /**
     * Select 'id', 'name', 'parent_id', 'created_on','updated_on'
     * and count issues by status_id store in 'issues_count' from Project.
     * @param $query
     * @param $status_id
     * @return mixed
     */
    public function scopeWithCountIssueStatus($query, $status_id) {
        return $query->select($this->selectFields)
            ->withCount(['issues' => function($q) use ($status_id) {
                if ($status_id) {
                    return $q->where('status_id', $status_id);
                }
            }])->get();
    }

    // parentCountIssueStatuses
    public function scopeParentCountIssueStatuses($query, $status_id = NULL) {
        return $query->select($this->selectFields)
            ->withCount(['issues' => function($q) use ($status_id) {
                if ($status_id) {
                    return $q->where('status_id', $status_id);
                }
            }])->where('parent_id', NULL)->get();
    }
}
