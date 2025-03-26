<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('signup');  // This is your login/signup form view
    }

    // Handle the login logic
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect based on user role
            $user = Auth::user();

            // Redirect the user to their respective dashboard
            switch ($user->role) {
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                case 'Technicien':
                    return redirect()->route('technicien.dashboard');
                case 'Hyperdesk':
                    return redirect()->route('hypedesa.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        // If login fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout(); // Log out the user
        return redirect()->route('signup'); // Redirect to login/signup page
    }
}

