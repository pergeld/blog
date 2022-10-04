<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\ArticleCategoryController;
use Route;

class ArticleCategoryModuleServiceProvider extends ServiceProvider
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
            Route::get('articleCategories/list', [ArticleCategoryController::class, 'index']);
            Route::get('articleCategories/create', [ArticleCategoryController::class, 'create']);
            Route::post('articleCategories/store', [ArticleCategoryController::class, 'store']);
            Route::get('articleCategories/{articleCategory}/edit', [ArticleCategoryController::class, 'edit']);
            Route::post('articleCategories/{articleCategory}', [ArticleCategoryController::class, 'update']);
            Route::delete('articleCategories/{articleCategory}', [ArticleCategoryController::class, 'destroy']);
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
