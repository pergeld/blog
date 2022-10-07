<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\PageContentController;
use Route;

class PageContentModuleServiceProvider extends ServiceProvider
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
            Route::get('pageContents/list', [PageContentController::class, 'index']);
            Route::get('pageContents/create', [PageContentController::class, 'create']);
            Route::post('pageContents/store', [PageContentController::class, 'store']);
            Route::get('pageContents/{pageContent}/edit', [PageContentController::class, 'edit']);
            Route::post('pageContents/{pageContent}', [PageContentController::class, 'update']);
            Route::delete('pageContents/{pageContent}', [PageContentController::class, 'destroy']);
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
