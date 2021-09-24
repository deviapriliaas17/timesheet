<?php

// use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', function () {
    return view('auth.login');
    // $user = auth()->user();
    // auth()->user()->assignRole('user');
    // if(auth()->user()->hasRole('user')) {
    //     return 'oke';
    // }
    // $role = Role::find(1);
    
    // $user->assignRole('admin'); // tambah
    // $role->revokePermissionTo('Add Employee'); // hapus
    // $role->syncPermissions('Add Employee', 'Edit Employee', 'Delete Employee', 'View Employee'); // revoke & add (update)
    // dd($role->hasAnyPermission(['Add Employee','Edit Employee'])); // cek beberapa permission
    // dd($user->hasPermission('View Employee')); // cek permission satupersatu
    
    // $user = auth()->user();
    
    // $user->givePermissionTo('View Employee');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard','DashboardController@index')->name('dashboard');

// TIMESHEET
Route::get('/timesheet','TimesheetController@index')->name('timesheet');
Route::post('/timesheet_actions','TimesheetController@store');
Route::get('/attendance/create/{location}/{day}','TimesheetController@create')->name('attendance');
Route::get('/attendance/{location}/{day}/edit','TimesheetController@edit');
Route::patch('/attendance_update/{id}', 'TimesheetController@update')->name('attendance_update');


// SUMMARY
Route::get('/summary','SummaryController@index')->name('summary');

// EMPLOYEE
Route::get('/employee','EmployeeController@index')->name('employee');
Route::get('/create_employee','EmployeeController@create');
Route::post('/create_employee','EmployeeController@store')->name('addEmployee');
Route::get('/employee/{id}/edit','EmployeeController@edit')->name('editEmployee');
Route::post('/employee_update/{id}', 'EmployeeController@update')->name('updateEmployee');
Route::get('/employee/{id}','EmployeeController@destroy');

// PROJECT
Route::get('/project', 'ProjectController@index');
Route::post('/add_project', 'ProjectController@store')->name('addProject');
Route::patch('/project', 'ProjectController@update')->name('updateProject');
Route::get('/project/{id}', 'ProjectController@destroy');

// PROJECT LOCATION
Route::get('/project_location', 'ProjectLocationController@index');
Route::post('/add_project_location', 'ProjectLocationController@store')->name('addProjectLocation');
Route::patch('/project_location', 'ProjectLocationController@update')->name('updateProjectLocation');
Route::get('/project_location/{id}', 'ProjectLocationController@destroy');


// ROLE
Route::get('/role', 'RoleController@index')->name('role');
Route::get('/create_role','RoleController@create');

// PERMISSION
Route::get('/permission', 'PermissionController@index')->name('permission');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/test', 'TestController@index');