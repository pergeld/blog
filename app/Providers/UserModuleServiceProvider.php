<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\UserController;
use Route;

class UserModuleServiceProvider extends ServiceProvider
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
            Route::get('users/list', [UserController::class, 'index']);
            Route::get('users/create', [UserController::class, 'create']);
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
