<?php
// Admin Dashboard Route

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'],function(){
    Route::get('/admin/login','LoginController@showLoginForm')->name('admin.login');    
    Route::post('admin/login', 'LoginController@adminLogin');
    Route::post('admin/logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>'auth:admin','prefix'=>'admin'],function(){
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('admin.deshboard');
        
        Route::get('/change/password/form', 'LoginController@changePasswordForm')->name('admin.change_password_form');
        Route::post('/change/password', 'LoginController@changePassword')->name('admin.change_password');

        // Branch
        Route::group(['namespace' => 'Branch'], function () {
            Route::get('/add/branch', 'BranchesController@index')->name('admin.add.branch');
            Route::post('/store/branch', 'BranchesController@store')->name('admin.store.branch');
            Route::get('/branch', 'BranchesController@show')->name('admin.list.branch');
            Route::get('/list/branch', 'BranchesController@branchList')->name('admin.ajax.branch_list');
            Route::get('/edit/branch/{id}', 'BranchesController@edit')->name('admin.edit.branch');
            Route::post('/update/branch/', 'BranchesController@update')->name('admin.update.branch');
            Route::get('/status/branch/{id}/{status}', 'BranchesController@status')->name('admin.status.branch');
            Route::get('/password/change/branch/{id}/', 'BranchesController@changePassword')->name('admin.change.password');
            Route::get('/password/branch/', 'BranchesController@doChangePassword')->name('admin.branch.change_password');
        });
    });
});