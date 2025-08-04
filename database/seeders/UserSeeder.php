<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      User::create([
        'first_name' => 'Ali',
        'last_name'=>'Abbas',
        'email' => 'ali@admin.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);

    User::create([
        'first_name' => 'Jamil',
        'last_name'=>'Shehab',
        'email' => 'shehab@admin.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);
    }
}
