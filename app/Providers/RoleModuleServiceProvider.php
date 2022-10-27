<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\RoleController;
use Route;

class RoleModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register routes
        Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
            Route::get('roles/list', [RoleController::class, 'index']);
            Route::get('roles/create', [RoleController::class, 'create']);
            Route::post('roles/store', [RoleController::class, 'store']);
            Route::get('roles/{role}/edit', [RoleController::class, 'edit']);
            Route::post('roles/{role}', [RoleController::class, 'update']);
            Route::delete('roles/{role}', [RoleController::class, 'destroy']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
