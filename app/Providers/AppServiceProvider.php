<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Définir une directive Blade pour afficher du contenu en fonction du rôle
         Blade::if('role', function ($role) {
            return Auth::check() && Auth::user()->role === $role;
        });

        // Gérer l'authentification dans les routes
        Route::middleware(['web'])->group(function () {
            Route::get('/login', function () {
                return view('auth.login');
            })->name('login');

            Route::post('/login', function (Request $request) {
                $credentials = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                if (Auth::attempt($credentials)) {
                    $user = Auth::user();

                    // Redirection selon le rôle
                    return redirect($user->role === 'admin' ? '/admin/home' : '/dashboard');
                }

                return back()->withErrors(['email' => 'Identifiants incorrects.']);
            });

            Route::post('/logout', function () {
                Auth::logout();
                return redirect('/login');
            })->name('logout');
        });
    }
}
