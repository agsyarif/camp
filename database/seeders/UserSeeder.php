<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'userAdmin@gmail.com', 'user_role_id' => 1, 'skill_id' => null, 'contact_number' => null, 'description' => null, 'email_verified_at' => now(), 'password' => bcrypt('admin'), 'two_factor_secret' => null, 'two_factor_recovery_codes' => null, 'remember_token' => 'Admin', 'current_team_id' => null, 'profile_photo_path' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mentor', 'email' => 'userMentor@gmail.com', 'user_role_id' => 2, 'skill_id' => null, 'contact_number' => null, 'description' => null, 'email_verified_at' => now(), 'password' => bcrypt('mentor'), 'two_factor_secret' => null, 'two_factor_recovery_codes' => null, 'remember_token' => 'Admin', 'current_team_id' => null, 'profile_photo_path' => null, 'created_at' => now(), 'updated_at' => now()]


        ]);
        // DB::table('user_roles')->insert([
        //     ['name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Mentor', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'User', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'Tutor', 'created_at' => now(), 'updated_at' => now()],
        // ]);
    }
}
