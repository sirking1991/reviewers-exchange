<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('courses', 'courses')->name('courses');    

    Route::view('course', 'course')->name('course');        

    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
