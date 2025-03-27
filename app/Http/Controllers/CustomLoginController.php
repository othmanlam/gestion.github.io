<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('signup');  // Your signup/login form view
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate the login form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6', // You can customize the password length as needed
        ]);

        // Check if the email exists in the database
        $user = User::where('email', $request->email)->first();

        // If user exists and the password matches
        if ($user && Hash::check($request->password, $user->mot_de_passe)) {
            // Log the user in
            Auth::login($user);

            // Redirect based on the user's role
            if ($user->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'Technicien') {
                return redirect()->route('technicien.dashboard');
            } elseif ($user->role == 'Hyperdesk') {
                return redirect()->route('hypedesa.dashboard');
            } else {
                // Default route if the role doesn't match
                return redirect()->route('signup');
            }
        } else {
            // If credentials are incorrect, redirect back with error message
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('signup');
    }
}
