<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\HyperdesqueController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\TechnicienController;

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // Pages selon le rôle
// Route::get('/home', function () {
//     return view('home'); // Page admin
// })->name('admin.home')->middleware('auth');

// Route::get('/technicien', function () {
//     return view('technicien'); // Page technicien
// })->name('technicien.dashboard')->middleware('auth');

// Route::get('/employe', function () {
//     return view('employe.dashboard'); // Page employé
// })->name('employe.dashboard')->middleware('auth');

// Route::get('/agent/dashboard', function () {
//     return view('agent.dashboard'); // Page agent Hyperdesk
// })->name('agent.dashboard')->middleware('auth');
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtilisateurController;
// Show the login form (signup page)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('signup');

// Handle login submission
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Handle logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role-based dashboard routes (protected by 'auth')
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('home');  // Admin Dashboard
    })->name('admin.dashboard');

    Route::get('/technicien', function () {
        return view('technicien');  // Technicien Dashboard
    })->name('technicien.dashboard');

    Route::get('/hyperdesk', function () {
        return view('hypedesa');  // Hyperdesk Dashboard
    })->name('hypedesa.dashboard');
    Route::get('/Employer', function () {
        return view('employer');  // 
    })->name('employer.dashboard');
});



Route::resource('utilisateurs', UtilisateurController::class);
