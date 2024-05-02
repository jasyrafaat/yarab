<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class webController extends Controller
{
    public function index(){
        // [0]["products"][0]["images"][0]["files"]
//         $user_id=Auth::guard("web")->user()->id;
// return cart::where("user_id",$user_id)->with("products.images")->get();
        $products= Product::with("images")->paginate(2);
        return view('web.index',compact('products'));
    }
    public function register(){
        return view("web.register");
    }

    public function data(Request $req){

        User::create($req->toArray());
        return redirect()->route('web/index');
    }

    public function login(){
        return view("web.login");
    }

    public function ChcekLogin(Request $req){
        if(Auth::guard("web")->attempt(["email"=>$req->email,"password"=>$req->password])){

            return redirect()->route("web/index");

        }else{
            return redirect()->back();
        }
    }


}
