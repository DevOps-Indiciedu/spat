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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('dashboard');
});


// MANAGE 

// Company Managment 
Route::controller(App\Http\Controllers\CompanyController::class)->group(function () {
    Route::get('/company', 'index')->name('company');
    Route::post('/add_company', 'insertOrupdate')->name('add_company');
    Route::post('/delete_company', 'destroy')->name('delete_company');
    Route::get('/edit_company/{id}', 'edit')->name('edit_company');
});

// Location Managment 
Route::controller(App\Http\Controllers\LocationController::class)->group(function () {
    Route::get('/location', 'index')->name('location');
    Route::post('/add_location', 'insertOrupdate')->name('add_location');
    Route::post('/delete_location', 'destroy')->name('delete_location');
    Route::get('/edit_location/{id}', 'edit')->name('edit_location');
});

// Department Managment 
Route::controller(App\Http\Controllers\DepartmentController::class)->group(function () {
    Route::get('/department', 'index')->name('department');
    Route::post('/add_department', 'insertOrupdate')->name('add_department');
    Route::post('/delete_department', 'destroy')->name('delete_department');
    Route::get('/edit_department/{id}', 'edit')->name('edit_department');
});

// User Role Managment 
Route::controller(App\Http\Controllers\UserRoleController::class)->group(function () {
    Route::get('/user_role', 'index')->name('user_role');
    Route::post('/add_userrole', 'insertOrupdate')->name('add_userrole');
    Route::post('/delete_userrole', 'destroy')->name('delete_userrole');
    Route::get('/edit_userrole/{id}', 'edit')->name('edit_userrole');
    
    Route::get('/req1', 'req1')->name('req1');
    Route::get('/req2', 'req2')->name('req2');
    Route::get('/req3', 'req3')->name('req3');
});
