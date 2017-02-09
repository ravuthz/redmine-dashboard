<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {

        $client = new \Redmine\Client('http://192.168.1.92', 'ravuthz.yo', '0964577770zZ');

//        $client->user->all();
        $users = $client->user->listing();

        $data['users'] = $client->user->all([
            'limit' => 100
        ]);

        $data['issues'] = $client->issue->all([
            'limit' => 1000
        ]);

        return view('home.index', $data);
    }
}
