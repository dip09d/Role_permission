<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrefAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pref_admin')->insert([
            'username' => 'admin2',
            'email' => 'admin2@example.com',
            'password' => bcrypt('123456'),
            'full_name' => 'dip',
            'registered_on' => now(),
            'status' => 1,
            'role_id' => 1, // Assuming role_id for admin role
        ]);
    }
}
