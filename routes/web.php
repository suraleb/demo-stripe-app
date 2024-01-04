<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
Route::get('/subscription/{id}', [SubscriptionController::class, 'create'])->name('subscription.create');

Route::group(['prefix' => 'admin'], function () {
    //admin auth routes
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login']);

    //admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('admin.dashboard');
    });
});

Auth::routes();
