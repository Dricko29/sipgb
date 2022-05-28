<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;

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


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class,'redirect'] )->name('dashboard');

    // super-admin
    Route::prefix('super-admin')->name('super-admin.')->middleware(['role:super-admin'])->group(function(){
        Route::get('/dashboard', [SuperAdminController::class,'dashboard'])->name('dashboard');
    });
    // admin
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function(){
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    });
    // operator
    Route::prefix('operator')->name('operator.')->middleware(['role:operator'])->group(function(){
        Route::get('/dashboard', [OperatorController::class,'dashboard'])->name('dashboard');
    });
    // user
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');
    });
    
    
});

require __DIR__.'/auth.php';