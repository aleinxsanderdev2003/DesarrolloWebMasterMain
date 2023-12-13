<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@web.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
