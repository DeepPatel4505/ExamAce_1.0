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
use App\Http\Controllers\AdminDashboardController;




Route::get('/', function () {


    $jobs = Job::orderBy('created_at', 'desc')->take(10)->get();
    $exams = Exam::orderBy('created_at', 'desc')->take(10)->get();
    $results = Result::orderBy('created_at', 'desc')->take(10)->get();

    $tags = Tag::take(20)->get();

    return view('welcome', compact('jobs', 'exams', 'results', 'tags'));
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
    Route::get('/profile', [ProfileController::class, 'index']);
});




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');

    //User management
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [AdminDashboardController::class, 'deleteUser'])->name('admin.users.destroy');


    // Job management
    Route::get('/admin/jobs', [AdminDashboardController::class, 'jobs'])->name('admin.jobs.index');

    Route::get('/admin/jobs/create', [AdminDashboardController::class, 'addJob'])->name('admin.jobs.create');
    Route::post('/admin/jobs', [AdminDashboardController::class, 'storeJob'])->name('admin.jobs.store');

    Route::get('/admin/jobs/{id}/edit', [AdminDashboardController::class, 'editJob'])->name('admin.jobs.edit');
    Route::put('/admin/jobs/{id}', [AdminDashboardController::class, 'updateJob'])->name('admin.jobs.update');

    Route::delete('/admin/jobs/{id}', [AdminDashboardController::class, 'deleteJob'])->name('admin.jobs.destroy');

    // Exam management
    Route::get('/admin/exams', [AdminDashboardController::class, 'exams'])->name('admin.exams.index');

    Route::get('/admin/exams/create', [AdminDashboardController::class, 'addExam'])->name('admin.exams.create');
    Route::post('/admin/exams', [AdminDashboardController::class, 'storeExam'])->name('admin.exams.store');

    Route::get('/admin/exams/{id}/edit', [AdminDashboardController::class, 'editExam'])->name('admin.exams.edit');
    Route::put('/admin/exams/{id}', [AdminDashboardController::class, 'updateExam'])->name('admin.exams.update');

    Route::delete('/admin/exams/{id}', [AdminDashboardController::class, 'deleteExam'])->name('admin.exams.destroy');

    // Result management
    Route::get('/admin/results', [AdminDashboardController::class, 'results'])->name('admin.results.index');

    Route::get('/admin/results/create', [AdminDashboardController::class, 'addResult'])->name('admin.results.create');
    Route::post('/admin/results', [AdminDashboardController::class, 'storeResult'])->name('admin.results.store');

    Route::get('/admin/results/{id}/edit', [AdminDashboardController::class, 'editResult'])->name('admin.results.edit');
    Route::put('/admin/results/{id}', [AdminDashboardController::class, 'updateResult'])->name('admin.results.update');

    Route::delete('/admin/results/{id}', [AdminDashboardController::class, 'deleteResult'])->name('admin.results.destroy');
});
