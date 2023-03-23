<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Role;

class RoleController extends Controller
{

    function createderole(){
        return view ('pages.role.createrole');
    }

    function storerole(Request $req){
        $role = new Role;
        $role->role_name = $req->role_name;
        $role->save();

       return redirect()->route('role.show');
    }
    

    function showrole(){
        $datas = Role::all();
        return view('pages.role.showrole',['datas'=>$datas]);
    }

    function editrole($id){
        $role = Role::find($id);
        return view('pages.role.editrole',['role'=>$role]);
    }

    function updatederole(Request $req,$id){
        $role = Role::find($id);

        $role->role_name = $req->role_name;
        $role->save();
        return redirect()->route('role.show');
    }


}
