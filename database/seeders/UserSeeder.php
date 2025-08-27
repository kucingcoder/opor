<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username'   => 'admin',
            'password'   => Hash::make('admin'),
            'name'  => 'John Doe',
            'profession' => 'Senior Web Developer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.',
            'email'      => 'johndoe@gmail.com',
            'phone'      => '08123456789',
            'address'    => 'Tegal, Indonesia',
            'photo'      => '202cb962ac59075b964b07152d234b70',
        ]);
    }
}
