<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("admin.login");
    }

    public function CheckLogin(Request $request){
        if(Auth::guard('admin')->attempt(["email"=>$request->email,"password"=>$request->password])){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back();
        }


    }
}
