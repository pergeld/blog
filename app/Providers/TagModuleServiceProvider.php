<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\TagController;
use Route;

class TagModuleServiceProvider extends ServiceProvider
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
            Route::get('tags/list', [TagController::class, 'index']);
            Route::get('tags/create', [TagController::class, 'create']);
            Route::post('tags/store', [TagController::class, 'store']);
            Route::get('tags/{tag}/edit', [TagController::class, 'edit']);
            Route::post('tags/{tag}', [TagController::class, 'update']);
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
