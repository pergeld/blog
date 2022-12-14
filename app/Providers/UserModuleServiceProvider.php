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
            Route::post('users/store', [UserController::class, 'store']);
            Route::get('users/{user}/edit', [UserController::class, 'edit']);
            Route::post('users/{user}', [UserController::class, 'update']);
            Route::view('profile/picture', 'admin.profile.picture');
            Route::post('profile/picture/change', [UserController::class, 'pictureChange']);
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
