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

Route::get('/timesheet','TimesheetController@index')->name('timesheet');
Route::post('/timesheet_actions','TimesheetController@store');

Route::get('/attendance','TimesheetController@create')->name('attendance');

Route::get('/summary','SummaryController@index')->name('summary');

Route::get('/employee','EmployeeController@index')->name('employee');
Route::get('/create_employee','EmployeeController@create');
Route::post('/create_employee','EmployeeController@store')->name('addEmployee');

Route::get('/project', 'ProjectController@index');
Route::post('/project', 'ProjectController@store');

Route::get('/role', 'RoleController@index')->name('role');
Route::get('/create_role','RoleController@create');

Route::get('/permission', 'PermissionController@index')->name('permission');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/test', 'TestController@index');