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
    // Route::get('/edit_company/{id}', 'edit')->name('edit_company');
});