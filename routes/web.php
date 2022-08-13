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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
            return view('user.dashboard');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/leave', [App\Http\Controllers\EmployeeController::class, 'getLeavePage'])->name('addLeave');
    Route::post('/leave', [App\Http\Controllers\EmployeeController::class, 'addLeave'])->name('storeLeave');
    Route::post('/holidays', [App\Http\Controllers\EmployeeController::class, 'getholidaysPage'])->name('holidayspage');
    Route::post('/projects', [App\Http\Controllers\EmployeeController::class, 'getProjectPage'])->name('projectpage');
    //Route::post('/attendence', [App\Http\Controllers\EmployeeController::class, 'getAttendencePage'])->name('attendencepage');
});
Route::get('admin/login',[App\Http\Controllers\Auth\AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [App\Http\Controllers\Auth\AdminAuthController::class, 'logout'])->name('adminLogout');

Auth::routes();



