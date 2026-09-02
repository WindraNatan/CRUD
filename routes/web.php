<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::middleware('throttle:60,1')->group(function () {
    Route::resource('students', StudentsController::class);
});
