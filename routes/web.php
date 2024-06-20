<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('courses', 'courses')
    ->middleware(['auth', 'verified'])
    ->name('courses');    

Route::view('course/{course}', 'course')
    ->middleware(['auth', 'verified'])
    ->name('course');        

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
