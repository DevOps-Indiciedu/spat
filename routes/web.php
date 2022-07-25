<?php

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
    return redirect()->route('login');
});

// Check Auth Middleware 

// if (Auth::guard('web')->check()) {
Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', function () {
            return view('dashboard');
        });
    


    // MANAGE //

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
        Route::get('/get_locations_by_companyID/{id}', 'get_locations_by_companyID')->name('get_locations_by_companyID');
    });

    // Department Managment 
    Route::controller(App\Http\Controllers\DepartmentController::class)->group(function () {
        Route::get('/department', 'index')->name('department');
        Route::post('/add_department', 'insertOrupdate')->name('add_department');
        Route::post('/delete_department', 'destroy')->name('delete_department');
        Route::get('/edit_department/{id}', 'edit')->name('edit_department');
        Route::get('/get_department_by_companyID/{id}/{iid}', 'get_department_by_companyID')->name('get_department_by_companyID');
    });

    // User Role Managment 
    Route::controller(App\Http\Controllers\UserRoleController::class)->group(function () {
        Route::get('/user_role', 'index')->name('user_role');
        Route::post('/add_userrole', 'insertOrupdate')->name('add_userrole');
        Route::post('/delete_userrole', 'destroy')->name('delete_userrole');
        Route::get('/edit_userrole/{id}', 'edit')->name('edit_userrole');
        
        // Extra Views 
        Route::get('/req1', 'req1')->name('req1');
        Route::get('/req2', 'req2')->name('req2');
        Route::get('/req3', 'req3')->name('req3');
        Route::get('/company_onboarding', 'company_onboarding')->name('company_onboarding');
    });

    // User Managment 
    Route::controller(App\Http\Controllers\UserManagementController::class)->group(function () {
        Route::get('/user', 'index')->name('user');
        Route::post('/add_user', 'insertOrupdate')->name('add_user');
        Route::post('/delete_user', 'destroy')->name('delete_user');
        Route::get('/edit_user/{id}', 'edit')->name('edit_user');
    });

    // Designation Management
    Route::controller(App\Http\Controllers\DesignationController::class)->group(function () {
        Route::get('/designation', 'index')->name('designation');
        Route::post('/add_designation', 'insertOrupdate')->name('add_designation');
        Route::post('/delete_designation', 'destroy')->name('delete_designation');
        Route::get('/edit_designation/{id}', 'edit')->name('edit_designation');
    });

    // Task Management
    Route::controller(App\Http\Controllers\TaskController::class)->group(function () {
        Route::get('/task', 'index')->name('task');
        Route::post('/add_task', 'insertOrupdate')->name('add_task');
        Route::post('/delete_task', 'destroy')->name('delete_task');
        Route::get('/edit_task/{id}', 'edit')->name('edit_task');
    });

    Route::controller(App\Http\Controllers\ReqListController::class)->group(function () {
        Route::get('/view_requirements', 'index')->name('view_requirements');
    });

});
// End Middleware 