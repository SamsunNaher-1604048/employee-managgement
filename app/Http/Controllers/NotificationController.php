<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;
use App\Models\leave_approve;
use App\Models\leave_apply;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use Auth;

class NotificationController extends Controller
{
    function shownotification(){

        $notifications = DB::table('notifications')
                               ->join('users', 'users.employee_id', '=', 'notifications.employee_id')
                               ->where('notifications.authority_id','=', Auth::user()->employee_id)
                               ->where('notifications.view',0)
                               ->select('users.*', 'notifications.*')
                               ->get();
        
        
        return view ('pages.notification',['notifications'=> $notifications]);

    } 
}
