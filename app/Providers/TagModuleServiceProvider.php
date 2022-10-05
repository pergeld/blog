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
