<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('error', function (){
    return view('auth.error');
})->name('error');

Route::get('consultasaime',[\App\Http\Controllers\Publico\UserController::class,'consulta'])->name('consultasaime');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','verified');

Route::middleware(['auth' , 'verified'])->group(function () {
    Route::resource('menus', \App\Http\Controllers\Publico\MenuController::class)->middleware('auth');

    Route::resource('menuRols', \App\Http\Controllers\Publico\Menu_rolController::class);

    Route::resource('users', \App\Http\Controllers\Publico\UserController::class);

    Route::get('/permissions', [App\Http\Controllers\Publico\PermissionController::class, 'index'])->name('permissions')->middleware('auth');
    Route::get('/permissions/create', [App\Http\Controllers\Publico\PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [App\Http\Controllers\Publico\PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{permission}', [App\Http\Controllers\Publico\PermissionController::class, 'show'])->name('permissions.show');
    Route::get('/permissions/{permission}/edit', [App\Http\Controllers\Publico\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{permission}', [App\Http\Controllers\Publico\PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{permission}', [App\Http\Controllers\Publico\PermissionController::class, 'destroy'])->name('permissions.destroy');


    Route::get('/roles', [App\Http\Controllers\Publico\RoleController::class, 'index'])->name('roles')->middleware('auth');
    Route::get('/roles/create', [App\Http\Controllers\Publico\RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [App\Http\Controllers\Publico\RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [App\Http\Controllers\Publico\RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{role}/edit', [App\Http\Controllers\Publico\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [App\Http\Controllers\Publico\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [App\Http\Controllers\Publico\RoleController::class, 'destroy'])->name('roles.destroy');

    Route::resource('capitanias', \App\Http\Controllers\Publico\CapitaniaController::class);

    Route::resource('auditables', \App\Http\Controllers\Publico\AuditsController::class);

});



