<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate([
            'email' => 'abeehaamanatali01@gmail.com'
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Abeeh@2004'),
            'is_admin' => true
        ]);
    }
}
