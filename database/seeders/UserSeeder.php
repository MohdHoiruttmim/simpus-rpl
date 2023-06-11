<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Nih Bos',
            'username' => 'admin',
            'email' => 'admin@paw.com',
            'password' => Hash::make('qwerty21'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Alex Bijer',
            'email' => 'heru@paw.com',
            'username' => 'lexjer',
            'password' => Hash::make('qwerty21'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Dani Alin',
            'email' => 'lin@paw.com',
            'username' => 'alin',
            'password' => Hash::make('qwerty21'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
