<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'issue_statuses';

    protected $selectFields = ['id', 'name'];

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }

    public function scopeCountAllIssues($query) {
        $counts = array();
        $statuses = $query->get();
        foreach($statuses as $status) {
            $counts[$status->id] = $status->issues()->count();
        }
        return $counts;
    }

    // withCountIssues
    // Select Status + Count all issues
    public function scopeWithCountIssues($query) {
        return $query->select($this->selectFields)->withCount('issues')->get();
    }
}
