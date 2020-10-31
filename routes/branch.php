<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Branch'], function () {
    Route::get('/branch/login', 'LoginController@showLoginForm')->name('branch.login');
    Route::post('login', 'LoginController@branchLogin');
    Route::post('logout', 'LoginController@logout')->name('branch.logout');
    Route::group(['middleware' => 'auth:branch', 'prefix' => 'branch'], function () {
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('branch.deshboard');

        Route::get('/change/password/form', 'LoginController@changePasswordForm')->name('branch.change_password_form');
        Route::post('/change/password', 'LoginController@changePassword')->name('branch.change_password');

        // Student
        Route::group(['namespace' => 'Student'], function () {
            Route::get('/add/student', 'StudentController@index')->name('branch.add.student');
            Route::post('/store/student', 'StudentController@store')->name('branch.store.student');
            Route::get('/show/student', 'StudentController@show')->name('branch.show.student');
            Route::get('/list/student', 'StudentController@list')->name('branch.list.student');
            Route::get('/view/student/{id}', 'StudentController@view')->name('branch.student.view');
            Route::get('/edit/student/{id}', 'StudentController@edit')->name('branch.student.edit');
            Route::put('/update/student/{id}', 'StudentController@update')->name('branch.student.update');
            Route::get('/delete/student/{id}', 'StudentController@destroy')->name('branch.student.delete');
            Route::get('/status/student/{id}/{status}', 'StudentController@status')->name('branch.student.status');
        });
    });
});
