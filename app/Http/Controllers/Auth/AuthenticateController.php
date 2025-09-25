<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;



class AuthenticateController extends Controller
{
    
    public function login()
    {
        return view('auth.login');
    }


    public function loginRequest(LoginRequest $request)
    {
        $user = $request->authenticate();

        $request->session()->regenerate();
        RateLimiter::clear($request->throttleKey());

            if ($user->user_status !== 'Active') {
                Auth::logout();
                return back()->with('error', 'Your account is inactive. Please contact your respective Coordinator.');
            }

            $user = Auth::user();
            // Store user info in session if needed
            session(['user' => $user]);

            // Redirect based on user type
            // Redirect based on user type
            if ($user->user_type === 'Student' || $user->user_type === 'Faculty') {
                return redirect()->route('dashboard')->with('success', 'Successfully Logged In!');
            } elseif ($user->user_type === 'Admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Successfully Logged In!');
            } else {
                Auth::logout();
                return redirect()->route('unauthorized')->with('error', 'Unauthorized access.');
            }
        }


        public function logout(Request $request)
        {
            // Perform logout logic here (e.g., invalidate session, clear cookies, etc.)
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect to the login page or any other desired location
            return redirect()->route('login')->with('success', 'You have been logged out.');
        }
}
