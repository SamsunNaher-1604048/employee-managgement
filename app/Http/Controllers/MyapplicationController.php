<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\leave_apply;
use App\Models\leave_approve;
use App\Models\User;
use App\Models\Department;
use Auth;


class MyapplicationController extends Controller
{
    function allshowapplication(){
        $myapplication = DB::table('leave_applies')
                    ->join('users', 'users.employee_id', '=', 'leave_applies.employee_id')
                    ->join('leave_approves', 'leave_applies.id', '=', 'leave_approves.leave_id')
                    ->where('leave_applies.employee_id',"=",Auth::user()->employee_id)
                    ->select('users.name', 'leave_approves.status','leave_applies.*')
                    ->get();

        return view ('pages.myapplication',['datas'=>$myapplication]);
    }



    function showapplication($id){
        $leave_apply = leave_apply::select('*')->where('id',$id)->first();

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
}
