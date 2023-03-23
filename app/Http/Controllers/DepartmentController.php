<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    function createdepartment(){
        $companys = Company::select('name','id')->where('status', 1)->get();
        $users = User::select('name','employee_id')->where('status','Active')->get();
        return view('pages.department.createdepartment',['companys'=>$companys,'users'=>$users]);
    }

    function storedepartment(Request $req){

        $department = New Department;

        $department->company_id = $req->company_id;
        $department->name = $req->name;
        $department->slug = str_replace(" ","_", $req->name);
        $department->status = $req->status;
        $department->head_of_dep = $req->head_of_dep;
        $department->save();

        return redirect()->route('department.show');
    }


    function showdepartment(){
        $departments = DB::table('departments')
            ->leftJoin('users', 'departments.head_of_dep', '=', 'users.employee_id')
            ->join('companies','companies.id','=','departments.company_id')
            ->select('departments.*','companies.name as companyName','users.name as head')
            ->get();

        return view('pages.department.showdepartment',['datas'=>$departments]);
    }


    function editdepartment($id){

        $department = DB::table('departments')
        ->select('departments.*', 'users.name as head','companies.name as companyName')
        ->leftJoin('users', 'departments.head_of_dep', '=', 'users.employee_id')
        ->join('companies','companies.id','=','departments.company_id')
        ->where('departments.id','=',$id)
        ->first();

        $companys = Company::select('name','id')->where('status', 1)->get();
        $users = User::select('name','employee_id')->where('status','Active')->get();

        return view('pages.department.editdepartment',['data'=>$department,'companys'=>$companys,'users'=>$users]);
    }

    function updatedepartment(Request $req,$id){

        $department = Department::find($id);
        $department->company_id = $req->company_id;
        $department->name = $req->name;
        $department->slug = str_replace(" ","_", $req->name);
        $department->status = $req->status;
        $department->head_of_dep = $req->head_of_dep;
        $department->save();
        return redirect()->route('department.show');

    }

}
