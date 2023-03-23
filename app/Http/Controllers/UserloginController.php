<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserloginController extends Controller
{
    function userlogin(){
        return view('pages.login');
    }

    function userauth(Request $req){
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if(Auth::user()->employee_id == 101){

                return redirect()->route('show.dashboard');
            }
            else{

                return redirect()->route('show.profile');
            }
             
        }
        else{
            return redirect()->route('user.login');
        }
 
    }

    function userlogout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
