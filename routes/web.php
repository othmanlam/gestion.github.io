<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\PanneController;

// Page de connexion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('signup');

// Authentification
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tableaux de bord basés sur les rôles (protégés par 'auth')
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('home');  // Admin Dashboard
    })->name('admin.dashboard');

    Route::get('/technicien', function () {
        return view('technicien');  // Technicien Dashboard
    })->name('technicien.dashboard');

    Route::get('/hyperdesk', function () {
        return view('hyperdesk');  // Hyperdesk Dashboard
    })->name('hyperdesk.dashboard');  // Correction ici du nom de la vue

    Route::get('/employe', function () {
        return view('employe');  // Employé Dashboard
    })->name('employe.dashboard');  // Correction ici du nom de la route
});

// Gestion des utilisateurs
Route::resource('utilisateurs', UtilisateurController::class);

// Gestion des postes
Route::resource('postes', PosteController::class); // Suppression de la redondance

// Gestion des pannes
Route::get('/mes-pannes', [PanneController::class, 'index'])->name('mes.pannes');
Route::resource('pannes', PanneController::class);
Route::post('/pannes/{panne}/signaler', [PanneController::class, 'signalerProbleme'])->name('pannes.signaler');

Route::prefix('pannes')->name('pannes.')->group(function() {
    Route::get('/declarer/{id}', [PanneController::class, 'declarerProbleme'])->name('declarerProbleme');
    Route::post('/declarer/{id}', [PanneController::class, 'storeDeclaration'])->name('storeDeclaration');
});

Route::get('/demande-suivi', [PanneController::class, 'demandeSuivi'])->name('demandeSuivi');
