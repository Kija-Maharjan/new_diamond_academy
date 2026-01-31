<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'maharjankija@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('kija<3980089'),
                'is_admin' => true,
            ]
        );

        $this->command->info('Admin user created/updated successfully!');
    }
}
