<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;

class DashboardController extends Controller
{
    function showdashboard(){
        $company = Company::all()->count();
        $depatment = Department::all()->count();
        $user = User::all()->count();

        return view('pages.dashboard',['company'=>$company, 'department'=>$depatment, 'user'=>$user]);
    }
}
