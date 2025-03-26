<?php





    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
    
    class AuthController extends Controller
    {
        public function showLoginForm()
        {
            return view('signup');  
        }
    
        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
    
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
    
                
                switch ($user->role) {
                    case 'Admin':
                        return redirect()->route('admin.dashboard');
                    case 'Technicien':
                        return redirect()->route('technicien.dashboard');
                    case 'AgentHyperdesk':
                        return redirect()->route('hypedesa.dashboard');
                    case 'Employé':
                            return redirect()->route('employer.dashboard');
                    default:
                        return redirect()->route('home');
                }
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    
        public function logout()
        {
            Auth::logout(); // Log out the user
            return redirect()->route('signup'); // Redirect to login/signup page
        }
    }
    



