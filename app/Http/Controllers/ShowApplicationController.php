<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;
use Auth;
use App\Models\leave_apply;
use App\Models\leave_approve;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class ShowApplicationController extends Controller
{
    function showapplication($id){
        $notification = notification::select('*')
                       ->where('leave_id',$id)
                       ->where('authority_id',Auth::user()->employee_id)
                       ->first();
        
        $notification->view =  1;
        $notification->save();
        
        $leave_apply = leave_apply::select('*')->where('id',$notification->leave_id)->first();

        $leave_approve = leave_approve::select('*')->where('leave_id',$leave_apply->id)->first();

        $user = User::select('users.*','designations.*','departments.name as departmentName')
                      ->join('designations','users.designation','=','designations.id')
                      ->join('departments','departments.id','=','users.department_id')
                      ->where('employee_id',$leave_apply->employee_id)
                      ->first();

       
        $report = User::select('name','signature')->where('employee_id',$user->repoting_boss)->first();

        $department_head = User::select('name','signature')->where('employee_id',$user->department_head)->first();

        $hr = User::select('name','signature')->where('designation', 1)->first();
        

       return view('pages.applicationpage',['leave_apply'=>$leave_apply , 'leave_approve'=>$leave_approve , 'user'=>$user,'report'=>$report,'department_head'=>$department_head ,'hr'=>$hr]);
    }




    function allApplicationshow(){

        if(Auth::user()->designation==1){
            $notifications_HR = DB::table('leave_approves')
                                ->join('leave_applies', 'leave_applies.id', '=', 'leave_approves.leave_id')
                                ->join('users', 'users.employee_id', '=', 'leave_applies.employee_id')
                                ->join('designations','designations.id','=','users.designation')
                                ->join('departments','departments.id','=','users.department_id')
                                ->select('users.*', 'leave_applies.*', 'leave_approves.*','designations.designation as userdesignation','departments.name as deparetmentName')
                                ->get();

               
            return view('pages.allleavetable',['datas'=>$notifications_HR]);
        }
        else{
            $department_head = User::select("department_head")->where('department_head', Auth::user()->employee_id)->first();

            if($department_head != null){
               $notifications_head = DB::table('leave_approves')
                                ->join('leave_applies', 'leave_applies.id', '=', 'leave_approves.leave_id')
                                ->join('users', 'users.employee_id', '=', 'leave_applies.employee_id')
                                ->join('designations','designations.id','=','users.designation')
                                ->join('departments','departments.id','=','users.department_id')
                                ->where('leave_approves.department_head',Auth::user()->employee_id)
                                ->select('users.*', 'leave_applies.*', 'leave_approves.*','designations.designation as userdesignation','departments.name as deparetmentName')
                                ->get();
                
                return view('pages.allleavetable',['datas'=> $notifications_head]);

            }
            else{
                $notifications_report = DB::table('leave_approves')
                                    ->join('leave_applies', 'leave_applies.id', '=', 'leave_approves.leave_id')
                                    ->join('users', 'users.employee_id', '=', 'leave_applies.employee_id')
                                    ->join('designations','designations.id','=','users.designation')
                                    ->join('departments','departments.id','=','users.department_id')
                                    ->where('leave_approves.reporting_boss',Auth::user()->employee_id)
                                    ->select('users.*', 'leave_applies.*', 'leave_approves.*','designations.designation as userdesignation','departments.name as deparetmentName')
                                    ->get();


                return view('pages.allleavetable',['datas'=>$notifications_report]);

            }
            
        }
    }
}
