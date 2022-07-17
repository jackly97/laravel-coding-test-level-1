<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => "Test 1",
            'email' => "test@mail.com",
            'password' => Hash::make('password'),
        ]);
    }
}
