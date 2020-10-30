<?php
// Frontend Route

// ========== Index =========
Route::get('/', function () {
    return view('web.index');
})->name('web.index');

// ========== Gallery =========
Route::get('/Gallery', function () {
    return view('web.gallery');
})->name('web.gallery');

// ========== Student-corner =========
Route::get('/Student-corner', function () {
    return view('web.student-corner');
})->name('web.student-corner');

// ========== Contact =========
Route::get('/Contact', function () {
    return view('web.contact');
})->name('web.contact');