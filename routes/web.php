<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['prefix' => 'admin'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    // Login Routes
    Route::get('/login', [LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit', [LoginController::class,'adminLogin'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');
});
