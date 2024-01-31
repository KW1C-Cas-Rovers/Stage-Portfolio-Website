<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Pages\app\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Category::count() > 0) {
            $this->command->info('Categories are already seeded. Skipping seeding.');
            return;
        }

        $categories = [
            ['name' => 'articles'],
            ['name' => 'content'],
        ];

        foreach ($categories as $category) {
            Category::factory()->create($category);
        }

        $this->command->info('Categories seeded successfully.');
    }
}
