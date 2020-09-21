<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'client', 'middleware' => 'auth'], function() {
    Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
    Route::get('/client/form', [App\Http\Controllers\ClientController::class, 'form'])->name('client.form');
    Route::post('/client/store', [App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
    Route::get('/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
    Route::post('/client/update/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/delete/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client.delete');
});

Route::group(['prefix' => 'vehicle', 'middleware' => 'auth'], function() {
    Route::get('/vehicle', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/vehicle/form', [App\Http\Controllers\VehicleController::class, 'form'])->name('vehicle.form');
    Route::post('/vehicle/store', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/vehicle/edit/{id}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/vehicle/update/{id}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('/vehicle/delete/{id}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicle.delete');
});

Route::group(['prefix' => 'device', 'middleware' => 'auth'], function() {
    Route::get('/device', [App\Http\Controllers\DeviceController::class, 'index'])->name('device.index');
    Route::get('/device/form', [App\Http\Controllers\DeviceController::class, 'form'])->name('device.form');
    Route::post('/device/store', [App\Http\Controllers\DeviceController::class, 'store'])->name('device.store');
    Route::delete('/device/delete/{id}', [App\Http\Controllers\DeviceController::class, 'destroy'])->name('device.delete');
    Route::get('/device/edit/{id}', [App\Http\Controllers\DeviceController::class, 'edit'])->name('device.edit');
    Route::post('/device/update/{id}', [App\Http\Controllers\DeviceController::class, 'update'])->name('device.update');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function() {
    Route::get('/users/index', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::get('/users/password/edit', [App\Http\Controllers\UsersController::class, 'edit_password'])->name('users.password.edit');
    Route::post('/users/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::post('/users/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
    Route::post('/users/update/password/{id}', [App\Http\Controllers\UsersController::class, 'update_password'])->name('users.password.update');
    Route::delete('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
});