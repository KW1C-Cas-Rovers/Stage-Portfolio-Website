<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Roles\app\Models\Role;
use Modules\Users\app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['first_name' => 'Cas', 'preposition' => null, 'last_name' => 'Rovers', 'email' => 'development@dev.com', 'is_active' => true]
        ];

        // Check if users are already seeded
        if (User::count() > 0) {
            $this->command->info('Users are already seeded. Skipping seeding.');
            return;
        }

        foreach ($users as $userData) {
            if (!User::where('email', $userData['email'])->exists()) {
                $user = User::factory()->create($userData);

                $role = Role::where('name', 'super-admin')->first();
                if ($role) {
                    $user->assignRole($role->id);
                } else {
                    $this->command->error("Role not found for user '{$userData['email']}'.");
                }
            } else {
                // Role already exists, skip creating it
                $this->command->info("User '{$userData['email']}' already exists, skipping creation.");
            }
        }

        $this->command->info('Users seeded successfully.');
    }
}
