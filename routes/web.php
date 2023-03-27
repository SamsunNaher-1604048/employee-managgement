<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\UserloginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Companycontroller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ShowApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login of user
Route::get('/',[UserloginController::class,'userlogin'])->name('user.login');
Route::post('/',[UserloginController::class,'userauth'])->name('user.auth');
Route::get('/logout',[UserloginController::class,'userlogout'])->name('user.logout');


// hr deshboard
Route::get('/dashboard',[DashboardController::class,'showdashboard'])->name('show.dashboard');


//user profile 
Route::get('/profile',[ProfileController::class,'showprofile'])->name('show.profile');


// company controller
Route::get('/create/company',[CompanyController::class,'createcompany'])->name('company.create');
Route::post('/store/company',[CompanyController::class,'storecompany'])->name('company.store');
Route::get('/show/company',[CompanyController::class,'showcompany'])->name('company.show');
Route::get('/edit/company/{id}',[CompanyController::class,'editcompany'])->name('company.edit');
Route::post('/update/conpany/{id}',[CompanyController::class,'updatecompany'])->name('company.update');


//department 
Route::get('/create/department',[DepartmentController::class,'createdepartment'])->name('department.create');
Route::post('/store/department',[DepartmentController::class,'storedepartment'])->name('department.store');
Route::get('/show/department',[DepartmentController::class,'showdepartment'])->name('department.show');
Route::get('/edit/department/{id}',[DepartmentController::class,'editdepartment'])->name('department.edit');
Route::post('/update/department/{id}',[DepartmentController::class,'updatedepartment'])->name('department.update');


// designation
Route::get('/create/designation',[DesignationController::class,'createdesignation'])->name('designation.create');
Route::post('/store/designation',[DesignationController::class,'storedesignation'])->name('designation.store');
Route::get('/show/designation',[DesignationController::class,'showdesignation'])->name('designation.show');
Route::get('/edit/designation/{id}',[DesignationController::class,'editdesignation'])->name('designation.edit');
Route::post('/update/designation/{id}',[DesignationController::class,'updatedesignation'])->name('designation.update');


//role 
Route::get('/create/role',[RoleController::class,'createderole'])->name('role.create');
Route::post('/store/role',[RoleController::class,'storerole'])->name('role.store');
Route::get('/show/role',[RoleController::class,'showrole'])->name('role.show');
Route::get('/edit/role/{id}',[RoleController::class,'editrole'])->name('role.edit');
Route::post('/update/role/{id}',[RoleController::class,'updatederole'])->name('role.update');


//employee controller
Route::get('/create/user',[UserController::class,'creatuser'])->name('user.create');
Route::post('/store/user',[UserController::class,'storeuser'])->name('user.store');
Route::get('/show/user',[UserController::class,'showuser'])->name('user.show');
Route::get('/edit/user/{id}',[UserController::class,'edituser'])->name('user.edit');
Route::post('/update/user/{id}',[UserController::class,'updateuser'])->name('user.update');


//leave controller
Route::post('/leave_apply',[LeaveController::class,'leaveapply'])->name('leaveapply');
Route::get('/leave_approve/{id}',[LeaveController::class,'leaveapprove'])->name('leave.approve');
Route::post('/leave_approve/{id}',[LeaveController::class,'leaveapprovestatus'])->name('leave.approve.status');



//notificationcontroller
Route::get('/notification',[NotificationController:: class,'shownotification'])->name('notification.show');


//leave show controller
Route::get('/showleave/{id}',[ShowApplicationController::class,'showapplication'])->name('application.show');
Route::get('/all_application',[ShowApplicationController::class,'allApplicationshow'])->name('Allapplication.show');


