<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter; // Add this import
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;


class AuthenticateController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }


    public function loginRequest(LoginRequest $request)
    {
        try {
            \Log::info('Login request received');
            $user = $request->authenticate();
            $request->session()->regenerate();

            RateLimiter::clear($request->throttleKey());

            if ($user->user_status !== 'Active') {
                auth()->logout();
                return back()->with('error', 'Your account is inactive. Please contact your respective Coordinator.');
            }

            // Store user info in session if needed
            session(['user_id' => $user->id, 'user_type' => $user->user_type]);

            // Redirect based on user type
            if ($user->user_type === 'student') {
                return redirect()->route('student.dashboard')->with('success', 'Successfully Logged In!');
            } elseif ($user->user_type === 'faculty') {
                return redirect()->route('faculty.dashboard')->with('success', 'Successfully Logged In!');
            } else {
                auth()->logout();
                return redirect()->route('unauthorized')->with('error', 'Unauthorized access.');
            }

        } catch (ValidationException $e) {
            \Log::error('Validation error during login:', $e->errors());
            return back()->with('error', 'Invalid credentials.');
        } catch (\Exception $e) {
            \Log::error('Unexpected error during login:', [$e->getMessage()]);
            return back()->with('error', 'An unexpected error occurred.');
        }
        }


        public function logout(Request $request): RedirectResponse
        {
            // Perform logout logic here (e.g., invalidate session, clear cookies, etc.)
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect to the login page or any other desired location
            return redirect('/')->with('success', 'You have been logged out.');
        }
}
