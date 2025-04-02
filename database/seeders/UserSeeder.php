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
        User::create([
            'name' => 'Israel García Betancourt',
            'email' => 'israel@example.com',
            'password' => bcrypt('123'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Joaquin Choquecawa',
            'email' => 'lajoaqui@example.com',
            'password' => bcrypt('321'),
        ])->assignRole('Editor');

        User::factory(9)->create();
    }
}
