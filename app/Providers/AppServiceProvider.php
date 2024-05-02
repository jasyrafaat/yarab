<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        Paginator::UseBootstrap();
        foreach(config('permissions.permission') as $permission){
            Gate::define($permission,function($per)use($permission){
                $per_login=Admin::findOrfail(Auth::guard("admin")->user()->id)->permission;
                return in_array($permission,$per_login);
            });
        }
    }
}
