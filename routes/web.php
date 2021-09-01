<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::get('/timesheet','TimesheetController@index')->name('timesheet');

Route::get('/attendance','AttendanceController@index')->name('attendance');

Route::get('/summary','SummaryController@index')->name('summary');

Route::get('/employee','EmployeeController@index')->name('employee');
Route::get('/create_employee','EmployeeController@create');

Route::get('/project', 'ProjectController@index')->name('project');

Route::get('/role', 'RoleController@index')->name('role');

Route::get('/permission', 'PermissionController@index')->name('permission');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');