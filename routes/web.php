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
Route::group(['middleware' => ['auth' ,'verified'] ], function () {
    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/leave', [App\Http\Controllers\EmployeeController::class, 'getLeavePage'])->name('addLeave');
    Route::post('/leave', [App\Http\Controllers\EmployeeController::class, 'addLeave'])->name('storeLeave');
    Route::get('/holidays', [App\Http\Controllers\EmployeeController::class, 'getholidaysPage'])->name('holidayspage');
    Route::get('/projects', [App\Http\Controllers\EmployeeController::class, 'getProjectPage'])->name('projectpage');
    Route::get('/attendence', [App\Http\Controllers\EmployeeController::class, 'getAttendencePage'])->name('attendencepage');
    Route::get('/profile', [App\Http\Controllers\EmployeeController::class, 'getProfilePage'])->name('profile');
    Route::put('/profile/{id}', [App\Http\Controllers\EmployeeController::class, 'updateProfile'])->name('saveprofile');
    Route::post('/punch-in', [App\Http\Controllers\EmployeeController::class, 'punch_in'])->name('punchIn');
    Route::post('/punch-out', [App\Http\Controllers\EmployeeController::class, 'punch_out'])->name('punchOut');
    Route::post('/project-summary', [App\Http\Controllers\ProjectController::class, 'add_project_summary'])->name('addprojectsummary');
    Route::get('/get-project-summary', [App\Http\Controllers\ProjectController::class, 'get_project_summary'])->name('getprojectsummary');
    
});
Route::get('admin/login',[App\Http\Controllers\Auth\AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [App\Http\Controllers\Auth\AdminAuthController::class, 'logout'])->name('adminLogout');
Auth::routes(['verify' => true]);


