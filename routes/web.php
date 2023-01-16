<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\CustomersController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Auth\LoginController;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    // Login Routes
    Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login/submit', [LoginController::class,'adminLogin'])->name('login.submit');

    // Logout Routes
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');

    // Roles Route
    Route::resource('roles',RolesController::class);
    // Customers Route
    Route::resource('customers',CustomersController::class);
    // Admins Route
    Route::resource('admins',AdminsController::class);
});
