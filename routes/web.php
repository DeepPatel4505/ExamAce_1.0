<?php

use App\Http\Controllers\examController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\tagController;
use App\Models\Exam;
use App\Models\Job;
use App\Models\Result;
use App\Models\Tag;
use App\Http\Controllers\ProfileController;




Route::get('/', function () {

    
    $jobs = Job::orderBy('created_at', 'desc')->take(10)->get();
    $exams = Exam::orderBy('created_at', 'desc')->take(10)->get();
    $results = Result::orderBy('created_at', 'desc')->take(10)->get();
    
    $tags = Tag::take(20)->get();

    return view('welcome', compact('jobs', 'exams', 'results','tags'));
});


//Route::resource('users', UserController::class);

//login
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

//register
Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register']);


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');

Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');

Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

Route::get('/results', [resultController::class, 'index'])->name('results.index');
Route::get('/results/{id}', [resultController::class, 'show'])->name('results.show');

Route::get('/exams', [examController::class, 'index'])->name('exams.index');
Route::get('/exams/{id}', [examController::class, 'show'])->name('exams.show');

Route::get('/tags', [tagController::class, 'index'])->name('tags.index');
Route::get('/tags/search', [TagController::class, 'search'])->name('tags.search');
Route::get('/tags/{tag}', [tagController::class, 'show'])->name('tags.show');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class,'index']);
});