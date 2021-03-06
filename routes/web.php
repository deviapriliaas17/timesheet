<?php

// use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', function () {
    return view('auth.login');
    // $user = auth()->user();
    // auth()->user()->assignRole('admin');
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
Route::post('/dashboard','DashboardController@index')->name('dashboard');
// Route::post('/dashboard', 'DashboardController@search')->name('search');

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

// POSITION
Route::get('/position', 'PositionController@index');
Route::post('/add_position', 'PositionController@store')->name('addPosition');
Route::patch('/position', 'PositionController@update')->name('updatePosition');
Route::get('/position/{id}', 'PositionController@destroy');

// PROJECT
Route::get('/project', 'ProjectController@index');
Route::post('/add_project', 'ProjectController@store')->name('addProject');
Route::patch('/project', 'ProjectController@update')->name('updateProject');
Route::get('/project/{id}', 'ProjectController@destroy');

// PROJECT LOCATION
Route::get('/project_location', 'ProjectLocationController@index');
Route::post('/add_project_location', 'ProjectLocationController@store')->name('addProjectLocation');
Route::patch('/project_location', 'ProjectLocationController@update')->name('updateProjectLocation');
Route::get('/project_location/{id}', 'ProjectLocationController@destroy')->name('deleteProjectLocation');

// ROLE
Route::get('/role', 'RoleController@index')->name('role');
Route::get('/create_role','RoleController@create');
Route::post('/role','RoleController@store')->name('addRole');
Route::get('/role/{id}/edit','RoleController@edit')->name('editRole');
Route::patch('/role/{id}','RoleController@update')->name('updateRole');
Route::get('/role/{id}', 'RoleController@destroy');

// PERMISSION
Route::get('/permission', 'PermissionController@index')->name('permission');
Route::post('/add_permission', 'PermissionController@store')->name('addPermission');
Route::post('/permission', 'PermissionController@update')->name('updatePermission');
Route::get('/permission/{id}', 'PermissionController@destroy');

Route::get('/category_permission', 'CategoryPermissionController@index')->name('category');
Route::post('/add_category', 'CategoryPermissionController@store')->name('addCategory');
Route::post('/category_permission','CategoryPermissionController@update')->name('updateCategoryPermission');
Route::get('/category_permission/{id}', 'CategoryPermissionController@destroy');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/test', 'TestController@index');