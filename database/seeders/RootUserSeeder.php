<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create root role if it doesn't exist
        $rootRole = Role::firstOrCreate(['name' => 'root']);

        // Create root user
        $rootUser = User::firstOrCreate(
            ['email' => 'root@conorld.com'],
            [
                'name' => 'Root',
                'lastname' => 'User',
                'email' => 'root@conorld.com',
                'password' => Hash::make('password123'),
                'phone' => '000000000',
            ]
        );

        // Assign root role to user
        if (!$rootUser->hasRole('root')) {
            $rootUser->assignRole('root');
        }

        $this->command->info('Root user created successfully!');
        $this->command->info('Email: root@conorld.com');
        $this->command->info('Password: password123');
    }
}
