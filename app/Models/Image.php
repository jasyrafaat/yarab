<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable=['product_id',"files"];

    public function product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }


    public static function craeteImage($images,$product_id){
        $all_img=$images["img"]??$images;
        foreach($all_img as $img){
            $new_name= md5(uniqid()).".".$img->extension();
             Image::create([
                "product_id"=>$product_id,
                "files"=>$new_name
             ]);
             $img->storeAs("public/images/$new_name");
        }

    }
}
