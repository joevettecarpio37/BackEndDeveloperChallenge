<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use Response;

class ActivityLogController extends Controller
{
    public function add(Request $request)
    {
        $id = \Auth::user()->id;
        $activity_log = new ActivityLog;
        $activity_log->user_id = $id;
        $activity_log->activity = $request->input('activity');
        $activity_log->save();
        
        return Response::json(true);
    }
}
