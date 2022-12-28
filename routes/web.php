<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->get('/profile', function () {
    return view('admin.profile.profile');
})->name('profile');

Route::middleware(['auth', 'verified'])->get('/password', function () {
    return view('admin.profile.password');
})->name('password');

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/upload', [UploadController::class, 'upload']);
});
