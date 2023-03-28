<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;

class ShowemployeeController extends Controller
{
    function showemployee(){
        $department_head = User::select('department_head')->where('department_head',Auth::user()->employee_id)->get()->count();

        if($department_head >0){

            $employee = DB::table('users')
                    ->join('designations', 'users.designation', '=', 'designations.id')
                    ->where('users.department_head',Auth::user()->employee_id)
                    ->select('users.*','designations.designation as designation')
                    ->get();

            return view ('pages.showemployee', ['datas'=>$employee]);

        }else{

            $reporting_boss = User::select('repoting_boss')->where('repoting_boss',Auth::user()->employee_id)->get()->count();

            if($reporting_boss>0){
                $employee = DB::table('users')
                    ->join('designations', 'users.designation', '=', 'designations.id')
                    ->where('users.repoting_boss',Auth::user()->employee_id)
                    ->select('users.*','designations.designation as designation')
                    ->get();

                return view ('pages.showemployee', ['datas'=>$employee]);
                
            }
            else{
                 return view ('pages.showemployee');
            }
           
        }
       

    }
}
