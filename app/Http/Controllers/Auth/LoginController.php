<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('signup'); // Affiche la page de connexion
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirection selon le rôle
            switch ($user->role) {
                case 'Admin':
                    return redirect()->route('admin.home');
                case 'Technicien':
                    return redirect()->route('technicien.dashboard');
                case 'Employé':
                    return redirect()->route('employe.dashboard');
                case 'AgentHyperdesk':
                    return redirect()->route('agent.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
