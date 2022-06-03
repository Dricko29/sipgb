<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;

use App\Http\Controllers\Akses\RoleController;
use App\Http\Controllers\Akses\UserController;
use App\Http\Controllers\Akses\PermissionController;

use App\Http\Controllers\LKD\RtController;
use App\Http\Controllers\LKD\RwController;
use App\Http\Controllers\LKD\DusunController;

use App\Http\Controllers\AKP\BahasaController;
use App\Http\Controllers\AKP\DarahController;
use App\Http\Controllers\AKP\AgamaController;
use App\Http\Controllers\AKP\KawinController;
use App\Http\Controllers\AKP\SukuController;
use App\Http\Controllers\AKP\HubunganController;
use App\Http\Controllers\AKP\PekerjaanController;
use App\Http\Controllers\AKP\PendidikanController;

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

    // akses
    Route::prefix('akses')->middleware(['permission:admin_akses'])->group(function(){
        // akses role
        Route::resource('roles', RoleController::class);
        Route::get('roles/{role}/permission', [RoleController::class, 'rolePermissions'])->name('roles.permissions');
        Route::post('roles/{role}/permissions', [RoleController::class, 'givePermissions'])->name('roles.give.permissions');
        Route::delete('roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermissions'])->name('roles.revoke.permissions');
        // akses permission
        Route::resource('permissions', PermissionController::class);
        Route::get('permissions/{permission}/role', [PermissionController::class, 'permissionRoles'])->name('permissions.roles');
        Route::post('permissions/{permission}/roles', [PermissionController::class, 'assignRoles'])->name('permissions.assign.roles');
        Route::delete('permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRoles'])->name('permissions.remove.roles');
        // akses user
        Route::resource('users', UserController::class)->only('index', 'create', 'store', 'destroy');
        Route::get('users/{user}/permission', [UserController::class, 'userPermissions'])->name('users.permissions');
        Route::post('users/{user}/permissions', [UserController::class, 'givePermissions'])->name('users.give.permissions');
        Route::delete('users/{user}/permissions/{permission}', [UserController::class, 'revokePermissions'])->name('users.revoke.permissions');
       
        
        Route::get('users/{user}/role', [UserController::class, 'userRoles'])->name('users.roles');
        Route::post('users/{user}/roles', [UserController::class, 'assignRoles'])->name('users.assign.roles');
        Route::delete('users/{user}/roles/{role}', [UserController::class, 'removeRoles'])->name('users.remove.roles');
        
    });
    
    Route::prefix('lembaga-kemasyarakatan')->group(function(){
        Route::resource('dusun', DusunController::class);
        Route::resource('rw', RwController::class);
        Route::resource('rt', RtController::class);
        Route::post('/sub-rw', [RtController::class,'subRw'])->name('sub.rw');

    });
    Route::prefix('atribut-kependudukan')->group(function(){
        Route::resource('agama', AgamaController::class);
        Route::resource('pekerjaan', PekerjaanController::class);
        Route::resource('pendidikan', PendidikanController::class);
        Route::resource('hubungan', HubunganController::class);
        Route::resource('kawin', KawinController::class);
        Route::resource('suku', SukuController::class);
        Route::resource('darah', DarahController::class);
        Route::resource('bahasa', BahasaController::class);
    });

    
});

require __DIR__.'/auth.php';