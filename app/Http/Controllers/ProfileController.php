<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProfileController extends Controller
{
    function showprofile(){

      $user =  DB::table('users')
                    ->leftJoin('departments', 'departments.id', '=', 'users.department_id')
                    ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
                    ->join('designations','designations.id','=','users.designation')
                    ->where('users.id', Auth::user()->id)
                    ->select('users.*', 'companies.name as companyName', 'departments.name as departmentName','designations.designation as userDesignation')
                    ->first();

        $report = User::select('name')
                       ->where('users.employee_id', $user->repoting_boss)
                       ->first();
        

      return view('pages.profile' ,['user'=>$user,'report'=>$report]);
    }
}
