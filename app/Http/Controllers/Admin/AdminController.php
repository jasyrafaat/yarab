<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(Gate::forUser(Auth::guard("admin")->user())->allows('view.user')){
            $admins=Admin::all();
              return view('admin.users.view',compact('admins'));

        // }else{
        //     abort(403);
        // }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Admin::create($request->toArray());
        return  redirect()->route('admin.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $admin=Admin::findOrfail($id);
    return view("admin.users.update",["admin"=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request["permission"]=implode("+",$request->permission);
         $all_data=$request->except('_token','_method');
         Admin::where("id",$id)->update($all_data);
         return  redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::findOrfail($id)->delete();
        return  redirect()->route('admin.index');

    }

    public function logout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login/admin');
    }
}
