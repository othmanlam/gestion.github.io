<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomLoginController;

Route::get('/', [CustomLoginController::class, 'showLoginForm'])->name('signup');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login');

// Routes protégées avec 'auth'
Route::middleware(['auth'])->group(function () {
    // Vérifier si l'utilisateur a bien une session active avant de rediriger
    Route::get('/admin', function () {
        if (session('role') === 'Admin') {
            return view('home'); // Page d'administration
        } else {
            return redirect()->route('signup')->withErrors(['message' => 'Accès interdit']);
        }
    })->name('admin.dashboard');

    Route::get('/technicien', function () {
        if (session('role') === 'Technicien') {
            return view('technicien'); // Page technicien
        } else {
            return redirect()->route('signup')->withErrors(['message' => 'Accès interdit']);
        }
    })->name('technicien.dashboard');

    Route::get('/hyperdesk', function () {
        if (session('role') === 'AgentHyperdesk') {
            return view('hypedesa'); // Page Hyperdesk
        } else {
            return redirect()->route('signup')->withErrors(['message' => 'Accès interdit']);
        }
    })->name('hypedesa.dashboard');

    Route::get('/employe', function () {
        if (session('role') === 'Employé') {
            return view('employe'); // Page employé
        } else {
            return redirect()->route('signup')->withErrors(['message' => 'Accès interdit']);
        }
    })->name('employe.dashboard');
});
