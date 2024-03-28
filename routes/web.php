<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Existing routes for the welcome page and dashboard
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Routes for managing notices
    Route::get('/admin/notices', [AdminController::class, 'index'])->name('admin_home');
    Route::get('/admin/notices/create', [AdminController::class, 'create'])->name('create_notice');
    Route::post('/admin/notices', [AdminController::class, 'store'])->name('admin.notices.store');
    Route::get('/admin/notices/{notice}', [AdminController::class, 'show'])->name('admin.notices.show');
    Route::get('/admin/notices/{notice}/edit', [AdminController::class, 'edit'])->name('edit_notice');
    Route::put('/admin/notices/{notice}', [AdminController::class, 'update'])->name('admin.notices.update');
    Route::delete('/admin/notices/{notice}', [AdminController::class, 'destroy'])->name('admin.notices.destroy');

    //Route to roles
    Route::get('/admin/project-members', [UserController::class, 'getProjectMembers'])->name('project_members');
    Route::get('/admin/examiners', [UserController::class, 'getExaminers'])->name('examiners');
    Route::get('/admin/supervisors', [UserController::class, 'getSupervisors'])->name('superviors');
    Route::get('/admin/students', [UserController::class, 'getStudents'])->name('students');

    //user page route
    
    Route::get('/admin/users/{role}', [UserController::class, 'getUserList']);
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');

    //add user
    Route::post('/admin/add-user', [UserController::class, 'addUser'])->name('addUser');




});
