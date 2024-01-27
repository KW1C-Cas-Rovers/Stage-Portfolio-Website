<?php

namespace Modules\Roles\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Roles\app\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create(['name' => 'super-admin', 'description' => 'Administrator']);
        Role::factory()->create(['name' => 'author', 'description' => 'Author']);
        Role::factory()->create(['name' => 'editor', 'description' => 'Administrator']);
        Role::factory()->create(['name' => 'user', 'description' => 'Regular user']);
    }
}
