<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    
    function createdesignation(){

        $departments = Department::all();
        return view ('pages.designation.createdasignation',['departments'=>$departments]);

     }

     function storedesignation(Request $req){
        $designation = new Designation;
        $designation->department_id = $req->department_id;
        $designation->designation = $req->designation;
        $designation->save();

        return redirect()->route('designation.show');

     }


    function showdesignation(){
        $datas = DB::table('designations')
            ->leftJoin('departments', 'designations.department_id', '=', 'departments.id')
            ->select('designations.*', 'departments.name as DepartmentName')
            ->get();


        return view('pages.designation.showdasignation',['datas'=>$datas]);
    }


    function editdesignation($id){

        $departments = Department::all();
        $designation = Designation::find($id);

        return view('pages.designation.editdesignation',['departments'=> $departments ,'designation'=> $designation]);

    }


    function updatedesignation( Request $req ,$id){

        $designation = Designation::find($id);
        $designation->department_id =  $req->department_id;
        $designation->designation = $req->designation;
        $designation->save();
        return redirect()->route('designation.show');
    }
}

