<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Company;
use App\Models\User;
use App\Models\Designation;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Hash;

class UserController extends Controller
{
    function creatuser(){
        $departments = Department::select('name','id')->where('status',1)->get();
        $companys = Company::select('name','id')->where('status',1)->get();
        $rep_boss = User::select('name','employee_id')->where('status','Active')->get();
        $designations = Designation::all();
        $roles = Role::all();
        $department_head = User::select('name','employee_id')->where('status','Active')->get();

        return view('pages.user.createuser',['departments'=>$departments ,"companys"=>$companys ,'rep_boss'=>$rep_boss ,'designations'=>$designations,'roles'=>$roles,'department_head'=>$department_head]);
    }

    function storeuser(Request $req){

        //from validation

        $req->validate([
            'employee_id'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'designation'=>'required',
            'password'=>'required'
        ]);


        $user = new User;

        // for employee table
        $user->employee_id = $req->employee_id;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->date_of_birth = $req->date_of_birth;
        $user->gender = $req->gender;
        $user->company_id = $req->company_id;
        $user->department_id = $req->department_id;
        $user->department_head = $req->department_head;
        $user->designation = $req->designation;
        $user->role = $req->role;
        $user->status = $req->status;
        $user->repoting_boss =$req->repoting_boss;
        $user->password =  Hash:: make($req->password);
        $user->leave = 20;



        // image

        if($req->hasFile('profile_pic')){
            $file = $req->file('profile_pic');
            $orgname = $file->getClientOriginalName();
            $path = 'employee/profile_pic/';
            $file -> move($path,$orgname);
            $user->profile_pic = $path.$orgname;
        }else{
            $user->profile_pic = " " ;
        }
        

        // cv
        if($req->hasFile('cv')){
            $file = $req->file('cv');
            $orgname = $file->getClientOriginalName();
            $path = 'employee/cv/';
            $file -> move($path,$orgname);
            $user->cv = $path.$orgname;
        }else{
            $user->cv = " " ;
        }


        //signature
        if($req->hasFile('signature')){
            $file = $req->file('signature');
            $orgname = $file->getClientOriginalName();
            $path = 'employee/signature/';
            $file -> move($path,$orgname);
            $user->signature = $path.$orgname;
        }else{
            $user->signature = " " ;
        }

        $user->save();

        return redirect()->route('user.show');
     }



    function showuser(){
        $users = DB::table('users')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('companies', 'users.company_id', '=', 'companies.id')
            ->select('users.*', 'departments.name as department_name', 'companies.name as conpany_name')
            ->orderBy('id', 'DESC')
            ->get();

        
        //return $users;

        return view('pages.user.showuser',['datas'=>$users]);
    }

    function edituser($id){

        $users = DB::table('users')
        ->select('users.*', 'departments.name as department_name', 'companies.name as conpany_name')
        ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
        ->leftJoin('companies', 'users.company_id', '=', 'companies.id')
        ->where('users.id','=',$id)
        ->first();

        $departments = Department::select('name','id')->where('status',1)->get();
        $companys = Company::select('name','id')->where('status',1)->get();
        $designations = Designation::all();
        $roles = Role::all();
        $rep_boss = User::select('name','employee_id')->where('status','Active')->where('id','!=',$id)->get();
        $department_head =  User::select('name','employee_id')->where('status','Active')->get();


        return view('pages.user.edituser',['data'=>$users,'departments'=>$departments,'companys'=>$companys, 'designations'=>$designations,'roles'=>$roles, 'rep_boss'=>$rep_boss,'department_head'=> $department_head ]);
    }

    
     function updateuser(Request $req,$id){

        $user = User::find($id);

        $user->employee_id = $req->employee_id;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->date_of_birth = $req->date_of_birth;
        $user->gender = $req->gender;
        $user->company_id = $req->company_id;
        $user->department_id = $req->department_id;
        $user->department_head = $req->department_head;
        $user->designation = $req->designation;
        $user->status = $req->status;
        $user->repoting_boss =$req->repoting_boss;

        // profile pic

        if($req->hasFile('profile_pic')){

            // if($user->profile_pic != null){
            //     unlink($user->profile_pic);
            // }
            $file = $req->file('profile_pic');
            $orgname = $file->getClientOriginalName();
            $path = 'employee/profile_pic/';
            $file -> move($path,$orgname);
            $user->profile_pic = $path.$orgname;

        }
        else{
            $user->profile_pic = $user->profile_pic ;
        }

        //cv
        if($req->hasFile('cv')){

            // if($user->cv != null){
            //     unlink($user->cv);
            // }

            $file = $req->file('cv');
            $orgname = $file->getClientOriginalName();
            $path = 'employee/cv/';
            $file -> move($path,$orgname);
            $user->cv = $path.$orgname;
        }
        else{
            $user->cv = $user->cv;
        }

        // signatute
        if($req->hasFile('signature')){

            // if($user->signature != null){
            //    unlink($user->signature);
            // }
            $file = $req->file('signature');
            $orgname = $file->getClientOriginalName();
            $path = 'employee/signature/';
            $file -> move($path,$orgname);
            $user->profile_pic = $path.$orgname;

        }
        else{
            $user->signature = $user->signature;
        }

        $user->save();
        return redirect()->route('user.show');
     }
}
