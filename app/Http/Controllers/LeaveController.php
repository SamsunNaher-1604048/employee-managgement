<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\leave_apply;
use App\Models\leave_approve;
use App\Models\notification;
use App\Models\User;
use Auth;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    function leaveapply(Request $req){

        $leave_apply = new leave_apply;
        $leave_apply->employee_id =  Auth::user()->employee_id;
        $leave_apply->leave_day = $req->leave_day;
        $leave_apply->from_date = $req->from_date;
        $leave_apply->to_date = $req->to_date;
        $leave_apply->date_to_join = $req->date_to_join;
        $leave_apply->leave_type = $req->leave_type;
        $leave_apply->resone = $req->resone;
        $leave_apply->save();



        //for leave approve table
    
        $user = User::select('*')->where('employee_id',Auth::user()->employee_id)->first();
        $department = Department::select('*')->where('id',$user->department_id)->first();
        $hr = DB::table('designations')
                       ->join('users','designations.id','=','users.designation')
                       ->where('designations.id','=',1)
                       ->select('users.*')
                       ->first();


        $notification_entrys = array($user->repoting_boss,$department->head_of_dep,$hr->employee_id);
            for($i=0;$i<3;$i++){
                if($notification_entrys[$i]==null){
                     $notification_entrys[$i] = 0;
                }
            }


                   
        $notification_entrys = array_unique($notification_entrys);
        $notification_entrys = array_diff($notification_entrys,[0]);



        //leave approval table data insert;
        $leave_approve = new leave_approve;
        $leave_approve->leave_id = $leave_apply->id;
        $leave_approve->hr = $hr->employee_id;
        $leave_approve->status = 'pending';


        if(sizeof($notification_entrys) == 3){
            $leave_approve->reporting_boss = $user->repoting_boss;
            $leave_approve->department_head = $department->head_of_dep;
            $leave_approve->save();
        }
        elseif(sizeof($notification_entrys) == 2){
            if($department->head_of_dep == Auth::user()->employee_id){
                $leave_approve->reporting_boss = $user->repoting_boss;
                $leave_approve->reporting_boss_approval = 'Approve';
                $leave_approve->department_head = $department->head_of_dep;
                $leave_approve->department_head_approval = 'Approve'; 
                $leave_approve->save();

            }else{
                $leave_approve->reporting_boss = $user->repoting_boss;
                $leave_approve->reporting_boss_approval = 'Approve';
                $leave_approve->department_head = $department->head_of_dep;
                $leave_approve->save();
            }
        }
        else{

            if(Auth::user()->designation == 1){
                $leave_approve->reporting_boss = $user->repoting_boss;
                $leave_approve->department_head = $department->head_of_dep;
                $leave_approve->reporting_boss_approval = 'Approve';
                $leave_approve->department_head_approval = 'Approve'; 
                $leave_approve->hr_approval = 'Approve'; 
                $leave_approve->status = 'Approve'; 
                $leave_approve->save();

            }
            else{
                $leave_approve->reporting_boss = $user->repoting_boss;
                $leave_approve->department_head = $department->head_of_dep;
                $leave_approve->reporting_boss_approval = 'Approve';
                $leave_approve->department_head_approval = 'Approve'; 
                $leave_approve->save();
            }
         
        }

        //notification table

        foreach($notification_entrys as $notification_entry){

            $notification = new notification;
            $notification->leave_id = $leave_apply->id;
            $notification->employee_id = Auth::user()->employee_id;
            $notification->authority_id = $notification_entry;
            if($notification_entry == Auth::user()->employee_id){
                $notification->view = 1;
            }
            $notification->save();
        }


        return redirect()->route('show.profile');
    }



    function leaveapprove(Request $req, $id){

        $leave_approve = leave_approve::select('*')->where('leave_id',$id)->first();

        if($leave_approve->reporting_boss == Auth::user()->employee_id){
            return "hello";
        }
        elseif($leave_approve->department_head == Auth::user()->employee_id){
            return "head";

        }else{
            return "hr";
        }


    }
    

    // function leaveapproveHr(Request $req){

    //     $leave_approve = leave_approve::select('*')->where('leave_id',$req->leave_id)->first();
    //     $leave_apply = leave_apply::find($leave_approve->leave_id);
    //     $user = User::select('*')->where('employee_id',$req->employee_id)->first();


    //     $leave_approve->hr_approval = $req->hr_approval;
    //     $leave_approve->hr_resone = $req->hr_resone;

    //     if($req->hr_approval == 'Inapprove'){
    //         $leave_approve->status = 'Inapprove';
    //     }
    //     else{
    //         $leave_approve->status = 'Approve';
    //         $user->leave = $user->leave - $leave_apply->leave_day;

    //     }

    //     $user->save();
    //     $leave_approve->save();

    //     return redirect()->route('notification.show');
    // }


    // function leaveapproveHead(Request $req){
    //     $leave_approve = leave_approve::select('*')->where('leave_id',$req->leave_id)->first();
    //     $leave_approve->department_head_approval = $req->department_head_approval;
    //     $leave_approve->departmental_resone = $req->departmental_resone;


    //     if($req->department_head_approval == 'Inapprove'){
    //         $leave_approve->status = 'Inapprove';
    //     }

    //     $leave_approve->save();

    //    return redirect()->route('notification.show');
    // }



    // function leaveapproveReport(Request $req){
    //     $leave_approve = leave_approve::select('*')->where('leave_id',$req->leave_id)->first();
    //     $leave_approve->reporting_boss_approval = $req->reporting_boss_approval;
    //     $leave_approve->repoting_boss_reasone = $req->repoting_boss_reasone;


    //     if($req->reporting_boss_approval == 'Inapprove'){
    //         $leave_approve->status = 'Inapprove';
    //     }

    //     $leave_approve->save();

    //    return redirect()->route('notification.show');

    // }
}
