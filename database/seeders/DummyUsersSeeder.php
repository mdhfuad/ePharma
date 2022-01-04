<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Manager
        /*User::create([
            'name' => 'Branch Manager',
            'email' => 'manager@mail.com',
            'password' => bcrypt('password'),
            'role' => 'manager'
        ]);

        // Officer
        User::create([
            'name' => 'Pharmaceutical Officer',
            'email' => 'officer@mail.com',
            'password' => bcrypt('password'),
            'role' => 'officer'
        ]);*/
    }
}
