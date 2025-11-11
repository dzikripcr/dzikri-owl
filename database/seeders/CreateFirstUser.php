<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cara pertama:
        $data['name']     = 'admin';
        $data['email']    = 'admin@pcr.ac.id';
        $data['password'] = Hash::make('admin123');
        User::create($data);

        // cara kedua:
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@pcr.ac.id',
        //     'password' => Hash::make('admin123'),
        // ]);
    }
}
