<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberAssignController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\MemberController;

// Existing routes for the welcome page and dashboard
Route::get('/', function () {
    return view ('mainhome'); 
});


    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

    //delete user
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('deleteUser.destroy');

    //assign members
    Route::get('/admin/assign-project', [MemberAssignController::class, 'showAssignmentForm'])->name('memberassign_form');
    Route::post('/admin/assign-task', [MemberAssignController::class, 'assignTask'])->name('assignTask');
    Route::get('/admin/assigned-tasks', [MemberAssignController::class, 'viewAssignedTasks'])->name('assigned_tasks');
    Route::delete('/admin/tasks/{task}', [MemberAssignController::class, 'destroy'])->name('admin_task.destroy');


       
    
    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/supervisor-home', [SupervisorController::class, 'index'])->name('suphome');
    Route::get('/member-home', [MemberController::class, 'index'])->name('memberhome');
    






