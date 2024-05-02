<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Product;
use App\trait\updateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    use updateProduct;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData=Product::with('images')->get();
        return view("admin.products.view",compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try{
            $product=$request->except('img');
            $data_pro=Product::create($product);
            $images=$request->only('img');
            Image::craeteImage($images,$data_pro->id);
            DB::commit();
            return redirect()->route("product.index");
        }catch(throwple $e){
            DB::rollback();
            return $e->getMessage();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::findOrfail($id);
        return view('admin.products.update',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(empty($request->img)){
        return $this->emptyImage($request,$id);
        }else{
            return $this->selectImage($request,$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrfail($id)->delete();
        return redirect()->route('product.index');
    }
}
