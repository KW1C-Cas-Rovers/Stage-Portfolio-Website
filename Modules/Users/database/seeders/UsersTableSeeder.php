<?php

namespace Modules\Users\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Users\app\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}
