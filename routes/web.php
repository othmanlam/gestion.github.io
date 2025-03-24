<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TechnicienController;
use App\Http\controllers\EmployerController;
use App\Http\Controllers\HyperdesqueController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/hyperdesque',[HyperdesqueController::class,'index'])->name('hyperdesque');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/employer',[EmployerController::class,'index'])->name('employer');
Route::get('/technicien',[TechnicienController::class, 'index'])->name('technicien');
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
