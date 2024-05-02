<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\webController;
use App\Http\Controllers\web\AjaxController;
use App\Http\Controllers\web\CartController;




Route::controller(webController::class)->group(function(){
    Route::get("/","index")->name("web/index");
    Route::get("register","register")->name("web/register");
    Route::post("data","data")->name("web/data");
    Route::get("login","login")->name("web/login");
    Route::post("ChcekLogin","ChcekLogin")->name("web/ChcekLogin");


});

Route::controller(AjaxController::class)->group(function(){
Route::post("cart","cart");
Route::post("deleteCart","deleteCart");
Route::post("search","search");
});




