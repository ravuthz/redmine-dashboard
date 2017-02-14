<?php

namespace App;

class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $client;

    public function __construct() {
        $this->client = new \Redmine\Client('http://192.168.1.92', 'admin', 'novell@01');
    }
}
