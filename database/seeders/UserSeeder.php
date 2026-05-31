<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@portalberita.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@portalberita.com',
                'password' => Hash::make('password'),
            ]);
            $this->command->info('Admin user created: admin@portalberita.com / password');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
