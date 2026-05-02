<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Business & Office', 'slug' => 'business'],
            ['name' => 'Gaming', 'slug' => 'gaming'],
            ['name' => 'Student & Home', 'slug' => 'student'],
            ['name' => 'Premium & Ultra-thin', 'slug' => 'premium'],
            ['name' => 'Budget', 'slug' => 'budget'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
