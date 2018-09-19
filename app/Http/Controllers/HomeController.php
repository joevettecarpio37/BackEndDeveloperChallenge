<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity_logs = ActivityLog::all()->where('user_id', '=', \Auth::user()->id)->sortByDesc('created_at');
        
 
        return view('home', ['activity_logs' => $activity_logs]);
    }
}
