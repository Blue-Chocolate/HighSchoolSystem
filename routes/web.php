<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsController as AdminStudentsController;
use App\Http\Controllers\StudentsController as StudentController;
use App\Http\Controllers\TeachersController as TeacherController;




Route::get('/', function () {
    return view('welcome');
})->name('home');

// Student routes
Route::prefix('admin')->group(function () {
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
});

// Teacher routes
Route::prefix('admin')->group(function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{id}/edit', [teacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{id}', [teacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{id}', [teacherController::class, 'destroy'])->name('teachers.destroy');
    // Add other teacher routes as needed
});


// student routes 
Route::get('/home', function () {
    return view('Student.home');
})->name('student.home');
