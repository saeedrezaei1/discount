<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();
//         \App\Models\Coupon::factory(100)->create();

         \App\Models\User::factory()->create([
             'name' => 'saeed',
             'email' => 'saeed@example.com',
             'email_verified_at' => now(),
             'password' => Hash::make(123456) , // password
             'remember_token' => Str::random(10),
             'type' => 'admin'
         ]);
    }
}
