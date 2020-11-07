<?php
// Frontend Route

// ========== Index =========

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'FrontendController@index')->name('web.index');
    Route::get('/Gallery', 'FrontendController@gallery')->name('web.gallery');
    Route::get('/Contact', 'FrontendController@contact')->name('web.contact');
    Route::post('/store/contact', 'FrontendController@storeContact')->name('web.store.contact');
    Route::post('/search/student', 'SearchStudentController@search')->name('web.ajax.searchstudent');
});
// ========== Student-corner =========
Route::get('/Student-corner', function () {
    return view('web.student-corner');
})->name('web.student-corner');

// ========== About =========
Route::get('/About', function () {
    return view('web.about');
})->name('web.about');

