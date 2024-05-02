<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;


Route::resource("admin",AdminController::class)->middleware('AuthAdmin');
Route::resource("product",ProductController::class)->middleware('AuthAdmin');
Route::get("logout",[AdminController::class,'logout'])->name('logout/admin');

Route::controller(LoginController::class)->middleware('guestAdmin')->group(function(){
Route::get("login","index")->name("login/admin");
Route::post("CheckLogin","CheckLogin")->name("CheckLogin/admin");
});

