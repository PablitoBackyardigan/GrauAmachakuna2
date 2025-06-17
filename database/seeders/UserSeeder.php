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
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('123'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => bcrypt('321'),
        ])->assignRole('Editor');

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@example.com',
            'password' => bcrypt('cliente123'),
        ]);

        User::create([
            'name' => 'zona1',
            'email' => 'zona1@example.com',
            'password' => bcrypt('zona1'),
            'zone_id' => 1,
        ]);

        User::create([
            'name' => 'zona2',
            'email' => 'zona2@example.com',
            'password' => bcrypt('zona2'),
            'zone_id' => 2,
        ]);

        User::create([
            'name' => 'zona3',
            'email' => 'zona3@example.com',
            'password' => bcrypt('zona3'),
            'zone_id' => 3,
        ]);

        User::create([
            'name' => 'zona4',
            'email' => 'zona4@example.com',
            'password' => bcrypt('zona4'),
            'zone_id' => 4,
        ]);

        User::create([
            'name' => 'zona5',
            'email' => 'zona5@example.com',
            'password' => bcrypt('zona5'),
            'zone_id' => 5,
        ]);

        User::create([
            'name' => 'zona6',
            'email' => 'zona6@example.com',
            'password' => bcrypt('zona6'),
            'zone_id' => 6,
        ]);

        User::create([
            'name' => 'zona7',
            'email' => 'zona7@example.com',
            'password' => bcrypt('zona7'),
            'zone_id' => 7,
        ]);

        User::create([
            'name' => 'zona8',
            'email' => 'zona8@example.com',
            'password' => bcrypt('zona8'),
            'zone_id' => 8,
        ]);
    }
}
