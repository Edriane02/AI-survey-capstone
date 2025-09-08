<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FacultyProfile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'email' => 'admin@usc.edu.ph',
            'password' => Hash::make('dcismadmin123'),
            'user_type' => 'Faculty',
            'user_status' => 'Active',
        ]);

        FacultyProfile::create([
            'user_id' => $user->id,
            'faculty_id' => '22101343',
            'title' => null,
            'first_name' => 'Admin',
            'middle_name' => null,
            'last_name' => 'User',
            'des_id' => 1, // Assuming '1' corresponds to a valid designation
            'department' => 'DCISM', // Assuming '1' corresponds to a valid department
        ]);

    }
}
