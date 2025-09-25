<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SetAccountController extends Controller
{
    //

      public function showSetAccountForm(Request $request, $user)
    {
        // Make sure the token exists in the URL
        $token = $request->query('token');
        if (!$token) {
            return redirect()->route('login')
                ->with('error', 'The account setup link is incomplete or missing required data.');
        }

        // Find the user
        $userModel = User::findOrFail($user);
        $email = $userModel->email;

        // Verify token exists in the database and is valid
        $entry = DB::table('password_reset_tokens')->where('email', $email)->first();
        if (!$entry || !Hash::check($token, $entry->token)) {
            return redirect()->route('login')->with('error', 'Invalid or expired token.');
        }

        // Validate the signed URL
        if (!$request->hasValidSignature()) {
            return redirect()->route('login')
                ->with('error', 'The  account setup link is invalid or has expired.');
        }

        return view('auth.set-account', [
            'email' => $email,
            'user' => $userModel
        ]);
    }

    public function savePassword(Request $request, $email)
    {
        $request->validate([
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $token = $request->token;

        // Look up the password reset entry by email
        $resetEntry = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$resetEntry || !Hash::check($token, $resetEntry->token)) {
            return redirect()->route('login')->with('error', 'Invalid or expired token.');
        }

        // Update password for user with that email
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'No user found.');
        }

        $user->password = $request->password;
        $user->save();

        // Delete used token
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('login')->with('success', 'Password set successfully. You may now log in.');
         
    }
}
