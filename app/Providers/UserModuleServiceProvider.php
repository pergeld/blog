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

            Route::group(['middleware' => 'isnotguestwriter'], function () {
                Route::get('users/create', [UserController::class, 'create']);
                Route::post('users/store', [UserController::class, 'store']);
            });
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
