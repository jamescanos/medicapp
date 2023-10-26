<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'James Cano',
            'email'             => 'jhonjamescanosanchez@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('14571499'), // password            
            'cedula'            =>  '14571499',
            'address'           =>  'Calle 1234',
            'phone'             =>  '3135185247',
            'role'              =>  'admin',
        ]);

        User::factory()
                ->count(50)
                ->create();
    }
}
