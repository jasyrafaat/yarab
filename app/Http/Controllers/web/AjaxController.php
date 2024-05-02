<?php

namespace App\Http\Controllers\web;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function cart(Request $request){
        $user_id=Auth::guard("web")->user()->id;
        $product_id=$request->id;
        $found=cart::where(["user_id"=>$user_id,"product_id"=>$product_id])->first();
        if($found){
            $found->increment("count");

        }else{
            DB::table("carts")->insert([
                "user_id"=>$user_id,
                "product_id"=>$product_id,
                "count"=>1
            ]);



        }
    }

    public function deleteCart(Request $request){
        cart::where("product_id",$request->product_id)->delete();
    }
    public function search(Request $request){
         $data=DB::table("products")->where("name","LIKE","%$request->_search%")->get(["name","id"]);
         if(!empty($request->_search)){
             foreach($data as $data){
                echo "<div> <a>$data->name</a>  </div>";
             }

         }else{
            echo "";
         }
    }
}
