<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'is_super_user' => 1,
            'name' => 'José Carlos',
            'email' => 'jcarneiro@professor.educacao.sp.gov.br',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'is_super_user' => 0,
            'name' => 'José Carlos Carneiro',
            'email' => 'jcarneiro@prof.educacao.sp.gov.br',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'is_super_user' => 0,
            'name' => 'José',
            'email' => 'jccarneiros@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'is_super_user' => 0,
            'name' => 'Jacira Loureiros',
            'email' => 'jaciraloureiross@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
