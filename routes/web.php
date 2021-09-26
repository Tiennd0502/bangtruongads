<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PositionController;
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


Route::get('/', [AdminController::class, 'getLogin'])->name('getLogin');
Route::get('', [AdminController::class, 'getLogin'])->name('getLogin');
Route::get('/login', [AdminController::class, 'getLogin']);
Route::post('', [AdminController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// user
Route::group(['prefix' => 'user', 'middleware'=>'auth'], function () {
    Route::get('/', [UserController::class, 'index'])                           ->name('user.index');
    Route::post('/comfirm', [UserController::class, 'getConfirm'])              ->name('user.getConfirm');
    Route::post('/employee-manager', [UserController::class, 'getMember'])      ->name('user.employeeManager');
    Route::post('/active/{id}', [UserController::class, 'active'])              ->name('user.active');
    Route::get('/create', [UserController::class, 'create'])                    ->name('user.create');
    Route::post('/', [UserController::class, 'store'])                          ->name('user.store');
    Route::put('/{id}', [UserController::class, 'update'])                      ->name('user.update')->whereNumber('id');
    Route::delete('/{id}', [UserController::class, 'destroy'])                  ->name('user.destroy')->whereNumber('id');
    Route::get('/{id}', [UserController::class, 'show'])                        ->name('user.show')->whereNumber('id');
    Route::get('/{id}/edit', [UserController::class, 'edit'])                   ->name('user.edit')->whereNumber('id');
    
});

Route::group(['prefix' => 'office', 'middleware'=>'auth'], function () {
    Route::get('/', [OfficeController::class, 'index'])                ->name('office.index');
    Route::get('/create', [OfficeController::class, 'create'])         ->name('office.create');
    Route::post('/', [OfficeController::class, 'store'])               ->name('office.store');
    Route::put('/{id}', [OfficeController::class, 'update'])           ->name('office.update')->whereNumber('id');
    Route::delete('/{id}', [OfficeController::class, 'destroy'])       ->name('office.destroy')->whereNumber('id');
    Route::get('/{id}', [OfficeController::class, 'show'])             ->name('office.show')->whereNumber('id');
    Route::get('/{id}/edit', [OfficeController::class, 'edit'])        ->name('office.edit')->whereNumber('id');
});

Route::group(['prefix' => 'position', 'middleware'=>'auth'], function () {
    Route::get('/', [PositionController::class, 'index'])                ->name('position.index');
    Route::get('/create', [PositionController::class, 'create'])         ->name('position.create');
    Route::post('/', [PositionController::class, 'store'])               ->name('position.store');
    Route::put('/{id}', [PositionController::class, 'update'])           ->name('position.update')->whereNumber('id');
    Route::delete('/{id}', [PositionController::class, 'destroy'])       ->name('position.destroy')->whereNumber('id');
    Route::get('/{id}', [PositionController::class, 'show'])             ->name('position.show')->whereNumber('id');
    Route::get('/{id}/edit', [PositionController::class, 'edit'])        ->name('position.edit')->whereNumber('id');
});