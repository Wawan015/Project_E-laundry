<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   
   
    return view('dashboard');
})->name('dashboard');


//Route::get('/home', [HomeController::class,'index'])->middleware(['auth:sanctum','verified']);

Route::group(['middleware' => 'auth'], function() {
   // Route::group(['middleware' => 'role:customer', 'prefix' => 'customer', 'as' => 'customer.'], function() {
     //   Route::resource('lessons', \App\Http\Controllers\Students\LessonController::class);
    //});
   Route::group(['middleware' => 'role:karyawan', 'prefix' => 'karyawan', 'as' => 'karyawan.'], function() {
       Route::resource('customers', \App\Http\Controllers\Karyawan\CustomerController::class);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('customers', \App\Http\Controllers\Karyawan\CustomerController::class);
       // Route::get('/customers/create', [\App\Http\Controllers\Karyawan\CustomerController::class, 'create']);
        //Route::get('/edit/{id}', [\App\Http\Controllers\Karyawan\CustomerController::class, 'edit']);
        //Route::put('/edit/{id}', [\App\Http\Controllers\Karyawan\CustomerController::class, 'update']);
        //Route::delete('/delete/{id}', [\App\Http\Controllers\Karyawan\CustomerController::class, 'delete']);
    });
    //Route::resource('customers', \App\Http\Controllers\Karyawan\CustomerController::class);
    Route::get('/customers/create', [\App\Http\Controllers\Karyawan\CustomerController::class, 'create']);
    Route::get('/edit/{id}', [\App\Http\Controllers\Karyawan\CustomerController::class, 'edit']);
    Route::put('/edit/{id}', [\App\Http\Controllers\Karyawan\CustomerController::class, 'update']);
    Route::delete('/delete/{id}', [\App\Http\Controllers\Karyawan\CustomerController::class, 'delete']);
    
});
