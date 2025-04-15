<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {

        // Permission::get()->map(function($permission){
        //     Gate::define($permission->slug, function($user) use ($permission) {
        //         return $user->hasPermissionTo($permission);
        //     });
        // });

        try
        {
            Permission::get()->map(function($permission){
                Gate::define($permission->slug, function($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        }
        catch(\Exception $ex)
        {
            report($ex);
            return false;
        }
    }
}
