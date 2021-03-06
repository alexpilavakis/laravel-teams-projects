<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
            Permission::get()->map(function($permission){
                Gate::define($permission->slug, function($user) use ($permission){
                    return $user->hasPermissionTo($permission);
                });
            });
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function testing()
    {
        Permission::get()->map(function($permission){
            Gate::define($permission->slug, function($user) use ($permission){
                return $user->hasPermissionTo($permission);
            });
        });
    }
}
