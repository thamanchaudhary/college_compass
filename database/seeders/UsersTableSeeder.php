<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aashish Pandit',
            'username' => 'Aashish Pandit',
            'email' => 'aashishpandit726@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
            'email_verified_at' => new DateTime(),
            'created_at' => new DateTime(),
        ]);
        User::create([
            'name' => 'User One',
            'username' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'user',
            'email_verified_at' => new DateTime(),
            'created_at' => new DateTime(),
        ]);
    }
}
