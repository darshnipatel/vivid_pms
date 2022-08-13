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



Route::group(['middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('/',[App\Http\Controllers\AdminController::class, 'dashboard'])->name('admindashboard');	
	Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'dashboard'])->name('admindashboard');	
	Route::get('/employees',[App\Http\Controllers\AdminController::class, 'get_employees'])->name('getemployees');	
	Route::get('/employees/detail',[App\Http\Controllers\AdminController::class, 'get_employee_detail'])->name('employeedetail');
	Route::resource('client', App\Http\Controllers\ClientController::class);
	Route::resource('project', App\Http\Controllers\ProjectController::class);
	Route::resource('holidays', App\Http\Controllers\HolidaysController::class);
	Route::resource('leave', App\Http\Controllers\LeaveController::class);
	Route::post('/leave-status-update',[App\Http\Controllers\LeaveController::class, 'update_leave_status'])->name('update_leave_status');	
	Route::post('/create-csv',[App\Http\Controllers\LeaveController::class, 'create_csv'])->name('create_csv');	
	
});



