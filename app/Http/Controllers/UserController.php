<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\CustomSetPasswordMail;
use App\Models\FacultyProfile;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    public function userManagement()
    {
         $studentUser = User::with('studentProfile')
            ->where('user_type', 'Student')
            ->get();

        // Faculty only (excluding coordinators)
        $facultyUser = User::with('facultyProfile')
            ->whereHas('facultyProfile', function ($q) {
                $q->where('role', 'Faculty');
            })
            ->get();

        // Coordinators (admins in your current tab)
        $adminUser = User::with('facultyProfile')
            ->whereHas('facultyProfile', function ($q) {
                $q->where('role', 'Coordinator');
            })
            ->get();

        return view('management.user-management.user-page', compact('studentUser', 'facultyUser', 'adminUser'));
    }


     public function storeUser(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'email' => 'required|email',
                'user_type' => 'required',
                'faculty_id' => 'required_if:user_type,Faculty|nullable',
                'student_id' => 'required_if:user_type,Student|nullable',
            ]);

            if (User::where('email', $request->email)->exists()) {
                return redirect()->route('users')->with('error', 'The email address already exists.');
            }

            $user = User::create([
                'email' => $request->email,
                'date_created' => now(),
                'password' => Hash::make(Str::random(14)),
                'user_type' => $request->user_type,
                'user_status' => 'Inactive'
            ]);

            if ($request->user_type === 'Faculty') {
                FacultyProfile::create([
                    'user_id' => $user->id,
                    'faculty_id' => $request->faculty_id,
                ]);
            } elseif ($request->user_type === 'Student') {
                StudentProfile::create([
                    'user_id' => $user->id,
                    'student_id' => $request->student_id,  
                ]);
            }

            $token = Password::createToken($user);

            // Send email with employee information
            Mail::to($user->email)->send(new CustomSetPasswordMail($user, $token));

            DB::commit();

            return redirect()->back()->with('success', 'User account created. An Account Setup link has been sent to their email.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
            // return redirect()->back()->with('error', 'An error occurred while creating the user. Please try again.');

        }
    }

     public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User account deleted successfully.');
    }

}
