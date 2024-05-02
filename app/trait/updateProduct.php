<?php
namespace App\trait;

use App\Models\Image;
use App\Models\Product;


trait updateProduct {

    public function emptyImage($request,$id){
        Product::where("id",$id)->update([
            "name"=>$request->name,
            "price"=>$request->price,
            "sale"=>$request->sale,
            "count"=>$request->count,
            "cateogry"=>$request->cateogry
        ]);

        return redirect()->route('product.index');

    }

    public function selectImage($request,$id){
        Product::where("id",$id)->update([
            "name"=>$request->name,
            "price"=>$request->price,
            "sale"=>$request->sale,
            "count"=>$request->count,
            "cateogry"=>$request->cateogry
        ]);
         Image::where("product_id",$id)->delete();
         Image::craeteImage($request->img,$id);
         return redirect()->route('product.index');
    }
}
