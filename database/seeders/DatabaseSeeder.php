<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'user',
            'email' => 'suraleb.boris+1@gmail.com',
            'password' => Hash::make('userpass')
        ]);

        Admin::factory()->create([
            'name' => 'admin',
            'email' => 'suraleb.boris@gmail.com',
            'password' => Hash::make('adminpass')
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
