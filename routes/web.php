<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\WelcomeAdminController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/company', function () {
    return view('company');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/solutions', function () {
    return view('solutions');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('cache:clear');
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', [SuperAdminController::class, 'getLogin'])->name('login');
    Route::post('/login', [SuperAdminController::class, 'postLogin']);
    Route::get('/register', [SuperAdminController::class, 'getRegister']);
    Route::post('/register', [SuperAdminController::class, 'postRegister']);
    Route::get('/logout', [SuperAdminController::class, 'logout']);

    Route::get('/welcome', [WelcomeAdminController::class, 'index']);
});