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
        $data = [
            'name' => 'admin',
            'email' => 'admin@samsung.com',
            'password' => bcrypt('admin@samsung2023'),
            'role_id' => 1
        ];

        $isExist = User::where('email', $data['email'])->exists();
        if (!$isExist) {
            User::insert($data);
        }
    }
}
