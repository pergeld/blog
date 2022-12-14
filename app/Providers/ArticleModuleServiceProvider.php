<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\ArticleController;
use Route;

class ArticleModuleServiceProvider extends ServiceProvider
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
            Route::get('articles/list', [ArticleController::class, 'index']);
            Route::get('articles/create', [ArticleController::class, 'create']);
            Route::post('articles/store', [ArticleController::class, 'store']);
            Route::get('articles/{article}/edit', [ArticleController::class, 'edit']);
            Route::post('articles/{article}', [ArticleController::class, 'update']);
            Route::delete('articles/{article}', [ArticleController::class, 'destroy']);
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
