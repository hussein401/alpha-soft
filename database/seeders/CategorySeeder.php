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
            ['name' => 'Lenovo', 'slug' => 'lenovo'],
            ['name' => 'HP', 'slug' => 'hp'],
            ['name' => 'Dell', 'slug' => 'dell'],
            ['name' => 'Toshiba', 'slug' => 'toshiba'],
            ['name' => 'Asus', 'slug' => 'asus'],
            ['name' => 'Sony', 'slug' => 'sony'],
            ['name' => 'Microsoft Surface', 'slug' => 'surface'],
            ['name' => 'iLife', 'slug' => 'ilife'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
