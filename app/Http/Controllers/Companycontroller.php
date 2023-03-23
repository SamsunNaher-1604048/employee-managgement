<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class Companycontroller extends Controller
{
    function createcompany(){
        return view ('pages.company.createcompany');
    }



    function storecompany(Request $req){
        $company = new Company;

        $company->name = $req->name;
        $company->slug = str_replace(" ","_", $req->name);
        $company->status = $req->status;
        $company->description = $req->description;

        if($req->hasFile('logo')){
            $file = $req->file('logo');
            $orgname = $file->getClientOriginalName();
            $path = 'company/logo/';
            $file -> move($path,$orgname);
            $company->logo = $path.$orgname;
        }
        else{
            $company->logo = " ";
        }

        $company->save();
       
        return redirect()->route('company.show');

    }


    function showcompany(){
        $company_datas = Company::all();
        return view('pages.company.showcompany',['datas'=>$company_datas]);

    }


    function editcompany($id){

        $company = Company::find($id);
        return view('pages.company.editcompany',['data'=>$company]);
    }


    function updatecompany(Request $req,$id){
        
        $company = Company::find($id);
        $company->name = $req->name;
        $company->slug = str_replace(" ","_", $req->name);
        $company->status = $req->status;
        $company->description = $req->description;
        
        if($req->hasFile('logo')){
            if($company->logo != " "){
               unlink($company->logo);
            }
            $file = $req->file('logo');
            $orgname = $file->getClientOriginalName();
            $path = 'company/logo/';
            $file -> move($path,$orgname);
            $company->logo = $path.$orgname;

        }
        else{
            $company->logo = " ";
        }
        
        $company->save();
        return redirect()->route('company.show');
    }

}
