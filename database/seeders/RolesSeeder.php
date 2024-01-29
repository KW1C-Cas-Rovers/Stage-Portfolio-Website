<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Roles\app\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if roles are already seeded
        if (Role::count() > 0) {
            $this->command->info('Roles are already seeded. Skipping seeding.');
            return;
        }

        $roles = [
            ['name' => 'super-admin', 'description' => 'Super admin role'],
            ['name' => 'editor', 'description' => 'Editor role'],
            ['name' => 'author', 'description' => 'Author role'],
            ['name' => 'user', 'description' => 'Regular user role'],
        ];

        foreach ($roles as $role) {
            Role::factory()->create($role);
        }

        $this->command->info('Roles seeded successfully.');
    }
}
