<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HyperdesqueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TechnicienController;

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
Route::get('/hyperdesque',[HyperdesqueController::class,'index'])->name('Hyperdesque');
Route::get('/technicien',[TechnicienController::class,'index'])->name('technicien');
Route::get('/',[LoginController::class,'index'])->name('Login');