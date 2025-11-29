<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/home', function () {
    return view('home');
});

//Students Routes
//Display all students
Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
//Route to display the form to create a new student
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
//store the student in the student table
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
//show details of a specific student by id
Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
//Edit student 
Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
//Update student
Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
//Delete student
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
