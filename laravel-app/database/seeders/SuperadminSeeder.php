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
        $superAdmin = new User;
        $superAdmin->name = 'Admin';
        $superAdmin->email = 'admin@example.com';
        $superAdmin->password = bcrypt('admin//');
        $superAdmin->is_admin = 1;
        $superAdmin->save();
    }
}
