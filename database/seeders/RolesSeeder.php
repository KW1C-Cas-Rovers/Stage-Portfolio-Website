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
            ['name' => 'Super Admin', 'description' => 'Super admin role'],
            ['name' => 'Editor', 'description' => 'Editor role'],
            ['name' => 'Author', 'description' => 'Author role'],
            ['name' => 'User', 'description' => 'Regular user role'],
        ];

        foreach ($roles as $role) {
            Role::factory()->create($role);
        }

        $this->command->info('Roles seeded successfully.');
    }
}
