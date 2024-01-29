<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'shovo',
            'email'=>'shovom6776@gmail.com',
            'password'=>Hash::make('password'),  // akana akjon user toire hoba

        ]);
    }
}
