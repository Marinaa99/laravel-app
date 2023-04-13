<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('11'),
        ]);
    }
}
