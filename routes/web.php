<?php

use App\Http\Controllers\examController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\resultController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/results', [resultController::class, 'index'])->name('results.index');
Route::get('/results/{id}', [resultController::class, 'show'])->name('results.show');

Route::get('/exams', [examController::class, 'index'])->name('exams.index');
Route::get('/exams/{id}', [examController::class, 'show'])->name('exams.show');