<?php

namespace App\Providers;

use App\Admin;
use App\Models\Admin\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AdminProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $permissions = Permission::with('roles')->get();
        dd(123);

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function(Admin $user) use ($permission) {
                return $user->hasPermission($permission);
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
        //
    }
}
