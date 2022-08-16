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
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     // return what you want
// });
// Route::get('/clear-config', function() {
//     $exitCode = Artisan::call('config:clear');
//     // return what you want
// });
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('verify-email/{token}/{id}', function () {
    return view('auth.verify-email');
})->name('verify-email');

// 2FA Auth 
Route::get('2fa', function () {
    return view('auth.2fa');
})->name('2fa');

// 2FA Auth 
Route::get('2fa-challenge', function () {
    return view('auth.two-factor-challange');
})->name('2fa-challenge');

Route::post('create-password',[App\Http\Controllers\UserManagementController::class,'create_password'])->name('create-password');

Route::get('/permission-denied', function () {
    return view('permission-denied');
})->name('permission-denied');

// Prevent Back History 
Route::group(['middleware' => 'prevent-back-history'],function(){
    
    // Check Auth Middleware 
    Route::group(['middleware' => ['auth']], function () {
        Route::group(['middleware'=>'user-permission:dashboard'],function(){
            Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');
            Route::post('save-token',[App\Http\Controllers\HomeController::class,'saveToken'])->name('save-token');
            Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');
        });
    
    //////////////////
    // MANAGE Module//
    //////////////////

    Route::get('/2FApermission/{id}/{status}', [App\Http\Controllers\UserManagementController::class,'TwoFactorPermission'])->name('2FApermission')->middleware(['middleware'=>'user-permission:2fa']);
    Route::get('/D2FApermission/{id}/{status}', [App\Http\Controllers\UserManagementController::class,'DisableTwoFactorPermission'])->name('D2FApermission')->middleware(['middleware'=>'user-permission:2fa']);
    // Company Managment 
    Route::group(['middleware'=>'user-permission:company_onboarding'],function(){
        Route::controller(App\Http\Controllers\CompanyController::class)->group(function () {
            Route::get('/company', 'index')->name('company');
            // ->middleware(['auth', 'verified']);
            Route::post('/add_company', 'insertOrupdate')->name('add_company');
            Route::post('/delete_company', 'destroy')->name('delete_company');
            Route::get('/edit_company/{id}', 'edit')->name('edit_company');
            Route::get('/company_onboarding', 'company_onboarding')->name('company_onboarding');
            Route::post('/block_company', 'block_company')->name('block_company');
            // ASSESSOR 
            Route::post('/add_assessor', 'insertOrupdateAssessor')->name('add_assessor');

        });
    });
    

    // Location Managment 
    Route::group(['middleware'=>'user-permission:location_managment'],function(){
        Route::controller(App\Http\Controllers\LocationController::class)->group(function () {
            Route::get('/location', 'index')->name('location');
            Route::post('/add_location', 'insertOrupdate')->name('add_location');
            Route::post('/delete_location', 'destroy')->name('delete_location');
            Route::get('/edit_location/{id}', 'edit')->name('edit_location');
            Route::get('/get_locations_by_companyID/{id}', 'get_locations_by_companyID')->name('get_locations_by_companyID');
        });
    });

    // Department Managment 
    Route::group(['middleware'=>'user-permission:department_management'],function(){
        Route::controller(App\Http\Controllers\DepartmentController::class)->group(function () {
            Route::get('/department', 'index')->name('department');
            Route::post('/add_department', 'insertOrupdate')->name('add_department');
            Route::post('/delete_department', 'destroy')->name('delete_department');
            Route::get('/edit_department/{id}', 'edit')->name('edit_department');
            Route::get('/get_department_by_companyID/{id}/{iid}', 'get_department_by_companyID')->name('get_department_by_companyID');
        });
    });


    // User Role Managment 
    Route::group(['middleware'=>'user-permission:role_management'],function(){
        Route::controller(App\Http\Controllers\UserRoleController::class)->group(function () {
            Route::get('/user_role', 'index')->name('user_role');
            Route::post('/add_userrole', 'insertOrupdate')->name('add_userrole');
            Route::post('/delete_userrole', 'destroy')->name('delete_userrole');
            Route::get('/edit_userrole/{id}', 'edit')->name('edit_userrole');
            Route::get('/role_rights/{id}', 'role_rights')->name('role_rights');
            Route::post('/save_rights', 'save_rights')->name('save_rights');
            
            // Extra Views 
            Route::get('/req1', 'req1')->name('req1');
            Route::get('/req2', 'req2')->name('req2');
            Route::get('/req3', 'req3')->name('req3');
        });
    });

    // User Managment 
    Route::group(['middleware'=>'user-permission:user_management'],function(){
        Route::controller(App\Http\Controllers\UserManagementController::class)->group(function () {
            Route::get('/user', 'index')->name('user');
            Route::post('/add_user', 'insertOrupdate')->name('add_user');
            Route::post('/delete_user', 'destroy')->name('delete_user');
            Route::get('/edit_user/{id}', 'edit')->name('edit_user');
        });
    });
    
    // Profile 
    Route::group(['middleware'=>'user-permission:profile'],function(){
        Route::controller(App\Http\Controllers\UserManagementController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::post('/profile_update', 'profile_update')->name('user-profile-update');
        });
    });
    // Designation Management
    Route::group(['middleware'=>'user-permission:designation_management'],function(){
        Route::controller(App\Http\Controllers\DesignationController::class)->group(function () {
            Route::get('/designation', 'index')->name('designation');
            Route::post('/add_designation', 'insertOrupdate')->name('add_designation');
            Route::post('/delete_designation', 'destroy')->name('delete_designation');
            Route::get('/edit_designation/{id}', 'edit')->name('edit_designation');
        });
    });

    // Task Management
    Route::group(['middleware'=>'user-permission:task_management'],function(){
        Route::controller(App\Http\Controllers\TaskController::class)->group(function () {
            Route::get('/task', 'index')->name('task');
            Route::post('/add_task', 'insertOrupdate')->name('add_task');
            Route::post('/delete_task', 'destroy')->name('delete_task');
            Route::get('/edit_task/{id}', 'edit')->name('edit_task');
            Route::get('/view_task_details/{id}/{rid}', 'view_task_details')->name('view_task_details');
            
        });
    });

    // Requuirment List 
    Route::controller(App\Http\Controllers\ReqListController::class)->group(function () {
        Route::get('/view_requirements', 'index')->name('view_requirements');
        Route::get('/standards', 'standards')->name('standards');
        Route::get('/select_req_list/{id}', 'select_req_list')->name('select_req_list');
        Route::post('/submit_req_register_list', 'submit_req_register_list')->name('submit_req_register_list');
        Route::get('/view_selected_req_list/{id}', 'view_selected_req_list')->name('view_selected_req_list');
        Route::get('/action_tracker/{id}', 'action_tracker')->name('action_tracker');
        Route::post('/submit_requirement_result', 'submit_requirement_result')->name('submit_requirement_result');
        Route::post('/get_prev_uploaded_files', 'get_prev_uploaded_files')->name('get_prev_uploaded_files');
        Route::post('/delete_observation_image', 'delete_observation_image')->name('delete_observation_image');
        Route::get('/observation_action_edit/{id}', 'observation_action_edit')->name('observation_action_edit');
        Route::post('/approve_document', 'approve_document')->name('approve_document');
        Route::get('/selected_observation/{id}', 'selected_observation')->name('selected_observation');
    });

    // Projects
    // Route::group(['middleware'=>'user-permission:company_onboarding'],function(){
        Route::controller(App\Http\Controllers\ProjectsController::class)->group(function () {
            Route::get('/projects', 'index')->name('projects');
            Route::post('/add_project', 'insertOrupdate')->name('add_project');
            Route::post('/delete_project', 'destroy')->name('delete_project');
            Route::get('/edit_project/{id}', 'edit')->name('edit_project');
            Route::get('/project_list', 'project_list')->name('project_list')->middleware(['middleware'=>'user-permission:project_list']);
            Route::get('/get_users_by_auditor_company/{id}', 'get_users_by_auditor_company')->name('get_users_by_auditor_company');
            Route::get('/project_logs/{id}', 'project_logs')->name('project_logs');
        });
    // });

    });
});
// End Middleware 