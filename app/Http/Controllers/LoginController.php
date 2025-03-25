<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{


protected function authenticated(Request $request, $user)
{
    if ($user->role === 'Admin') {
        return redirect('/home'); // Redirection de l'admin vers home
    }

    return redirect('/dashboard'); // Redirection des autres utilisateurs
}

}
