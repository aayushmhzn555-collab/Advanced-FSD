<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Redirect root URL "/" to students index page
Route::get('/', fn () => redirect()->route('students.index'));

// Resource routes for students and courses
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
