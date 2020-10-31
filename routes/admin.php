<?php
// Admin Dashboard Route

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@adminLogin');
    Route::post('admin/logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('admin.deshboard');

        Route::get('/change/password/form', 'LoginController@changePasswordForm')->name('admin.change_password_form');
        Route::post('/change/password', 'LoginController@changePassword')->name('admin.change_password');

        // Branch
        Route::group(['namespace' => 'Branch'], function () {
            Route::get('/add/branch', 'BranchesController@index')->name('admin.add.branch');
            Route::post('/store/branch', 'BranchesController@store')->name('admin.store.branch');
            Route::get('/branch', 'BranchesController@show')->name('admin.list.branch');
            Route::get('/list/branch', 'BranchesController@branchList')->name('admin.ajax.branch_list');
            Route::get('/show/student/{id}', 'BranchesController@showList')->name('admin.show.student');
            Route::get('/list/student/{id}', 'BranchesController@listStudent')->name('admin.list.student');
            Route::get('/edit/branch/{id}', 'BranchesController@edit')->name('admin.edit.branch');
            Route::post('/update/branch/', 'BranchesController@update')->name('admin.update.branch');
            Route::get('/status/branch/{id}/{status}', 'BranchesController@status')->name('admin.status.branch');
            Route::get('/password/change/branch/{id}/', 'BranchesController@changePassword')->name('admin.change.password');
            Route::get('/password/branch/', 'BranchesController@doChangePassword')->name('admin.branch.change_password');
        });
        // Gallery
        Route::group(['namespace' => 'Gallery'], function () {
            Route::get('/add/gallery', 'GalleryController@index')->name('admin.add.gallery');
            Route::post('/store/gallery', 'GalleryController@store')->name('admin.store.gallery');
            Route::get('/show/gallery', 'GalleryController@show')->name('admin.show.gallery');
            Route::get('/list/gallery', 'GalleryController@list')->name('admin.list.gallery');
            Route::get('/delete/gallery/{id}', 'GalleryController@destroy')->name('admin.destroy.gallery');
            Route::get('/status/gallery/{id}/{status}', 'GalleryController@status')->name('admin.status.gallery');
        });
        // Conatct
        Route::group(['namespace' => 'Contact'], function() {
            Route::get('/contact', 'ContactController@index')->name('admin.contact');
            Route::get('/show/in/touch', 'ContactController@show')->name('admin.ajax.show_contact');
            Route::get('/delete/contact/{id}', 'ContactController@destroyContact')->name('admin.delete_contact');
            Route::get('/subject/{id}', 'ContactController@subject')->name('admin.subject');
        });
        
         // Course
         Route::group(['namespace' => 'Course'], function () {
            Route::resource('course', 'CourseController');
            Route::get('/branch/list', 'CourseController@branchList')->name('branch.ajax.course_list');
            Route::get('course/status/{id}/{status}', 'CourseController@status')->name('course.status');
            Route::get('course/edit/{id}', 'CourseController@editCourse')->name('branch.course.edit');
            Route::get('course/delete/{id}', 'CourseController@destroyCourse')->name('branch.course.destroy');
            Route::post('update/course', 'CourseController@updateCourse')->name('branch.course.update');
        });
         // Book Class List
         Route::group(['namespace' => 'Book'], function () {
            Route::get('/book/class/', 'BookClassController@index')->name('book.class');
            Route::get('/book/class/list', 'BookClassController@list')->name('book.ajax.book_list');
            Route::get('book/delete/{id}', 'BookClassController@destroy')->name('book.class.destroy');
        });
    });
});
