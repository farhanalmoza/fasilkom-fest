<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'litbang.integral@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'role_id' => 1,
        ]);
    }
}
