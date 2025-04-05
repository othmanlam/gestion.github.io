<?php

use App\Http\Controllers\assignercontroller;
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
use App\Http\Controllers\PosteController;

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


// Route::resource('postes', PosteController::class);


Route::resource('postes', PosteController::class);
use App\Http\Controllers\PanneController;

Route::get('/mes-pannes', [PanneController::class, 'index'])->name('mes.pannes');
Route::resource('pannes', PanneController::class);
Route::post('/pannes/{panne}/signaler', [PanneController::class, 'signalerProbleme'])->name('pannes.signaler');
Route::prefix('pannes')->name('pannes.')->group(function() {
    // Route pour afficher le formulaire de déclaration de problème
    Route::get('/declarer/{id}', [PanneController::class, 'declarerProbleme'])->name('declarerProbleme');
    // Route pour enregistrer la déclaration de problème
    Route::post('/declarer/{id}', [PanneController::class, 'storeDeclaration'])->name('storeDeclaration');
});
Route::get('/demande-suivi', [PanneController::class, 'demandeSuivi'])->name('demandeSuivi');

// routes/web.php
use App\Http\Controllers\assingController;

// Route::resource('assign', assingController::class);

// // المسار لتعيين التقني لـ panne
// Route::post('pannes/{id}/assign', [assingController::class, 'assignTechnicien'])->name('pannes.assign');





  Route::get('/assigner', [assignercontroller::class, 'index'])->name('assigner.index');
  Route::get('/assigner/{panne_id}/technicians', [assignercontroller::class, 'showTechnicians'])->name('assigner.technicians');
  Route::post('/assigner', [assignercontroller::class, 'storeAssignment'])->name('assigner.store');
  use App\Http\Controllers\FinController;

Route::get('interventions', [FinController::class, 'index'])->name('interventions.index');
Route::get('interventions/{id}/edit', [FinController::class, 'edit'])->name('interventions.edit');
Route::put('interventions/{id}', [FinController::class, 'update'])->name('interventions.update');

  