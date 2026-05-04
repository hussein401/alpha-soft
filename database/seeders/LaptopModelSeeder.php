<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\LaptopModel;

class LaptopModelSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            'lenovo' => [
                ['name' => 'ThinkPad', 'slug' => 'thinkpad', 'image' => 'img/laptops/laptop_lenovo_thinkpad_1777718313594.png'],
                ['name' => 'IdeaPad', 'slug' => 'ideapad', 'image' => 'img/laptops/laptop_lenovo_ideapad_1777718294494.png'],
                ['name' => 'Yoga', 'slug' => 'yoga', 'image' => 'img/laptops/laptop_lenovo_ideapad_1777718294494.png'],
                ['name' => 'Legion', 'slug' => 'legion', 'image' => 'img/laptops/laptop_lenovo_ideapad_1777718294494.png'],
            ],
            'hp' => [
                ['name' => 'EliteBook', 'slug' => 'elitebook', 'image' => 'img/laptops/laptop_hp_elitebook_1777718404770.png'],
                ['name' => 'ProBook', 'slug' => 'probook', 'image' => 'img/laptops/laptop_hp_elitebook_1777718404770.png'],
                ['name' => 'Victus', 'slug' => 'victus', 'image' => 'img/laptops/laptop_hp_victus_1777718328341.png'],
                ['name' => 'Pavilion', 'slug' => 'pavilion', 'image' => 'img/laptops/laptop_hp_victus_1777718328341.png'],
            ],
            'dell' => [
                ['name' => 'Latitude', 'slug' => 'latitude', 'image' => 'img/laptops/laptop_dell_latitude_1777718342814.png'],
                ['name' => 'Precision', 'slug' => 'precision', 'image' => 'img/laptops/laptop_dell_precision_1777718358900.png'],
                ['name' => 'XPS', 'slug' => 'xps', 'image' => 'img/laptops/laptop_dell_latitude_1777718342814.png'],
                ['name' => 'Inspiron', 'slug' => 'inspiron', 'image' => 'img/laptops/laptop_dell_latitude_1777718342814.png'],
            ],
            'toshiba' => [
                ['name' => 'Satellite', 'slug' => 'satellite', 'image' => 'img/laptops/laptop_toshiba_satellite_1777718388986.png'],
                ['name' => 'Dynabook', 'slug' => 'dynabook', 'image' => 'img/laptops/laptop_toshiba_satellite_1777718388986.png'],
            ],
            'asus' => [
                ['name' => 'ROG', 'slug' => 'rog', 'image' => 'img/laptops/laptop_asus_rog_1777718420102.png'],
                ['name' => 'ZenBook', 'slug' => 'zenbook', 'image' => 'img/laptops/laptop_asus_rog_1777718420102.png'],
                ['name' => 'VivoBook', 'slug' => 'vivobook', 'image' => 'img/laptops/laptop_asus_rog_1777718420102.png'],
            ],
            'sony' => [
                ['name' => 'Vaio', 'slug' => 'vaio', 'image' => 'img/laptops/laptop_sony_vaio_1777718372184.png'],
            ],
            'surface' => [
                ['name' => 'Surface Pro', 'slug' => 'surface-pro', 'image' => 'img/laptops/laptop_microsoft_surface_1777718434304.png'],
                ['name' => 'Surface Laptop', 'slug' => 'surface-laptop', 'image' => 'img/laptops/laptop_microsoft_surface_1777718434304.png'],
            ],
            'ilife' => [
                ['name' => 'ZedBook', 'slug' => 'zedbook', 'image' => 'img/laptops/laptop_ilife_1777718447939.png'],
            ],
        ];

        foreach ($models as $brandSlug => $brandModels) {
            $category = Category::where('slug', $brandSlug)->first();
            if ($category) {
                foreach ($brandModels as $modelData) {
                    $modelData['category_id'] = $category->id;
                    LaptopModel::firstOrCreate(['slug' => $modelData['slug']], $modelData);
                }
            }
        }
    }
}
