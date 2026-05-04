<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laptop;
use App\Models\Category;
use App\Models\LaptopModel;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch models to map them
        $modelThinkPad   = LaptopModel::where('slug', 'thinkpad')->first()->id;
        $modelIdeaPad    = LaptopModel::where('slug', 'ideapad')->first()->id;
        $modelEliteBook  = LaptopModel::where('slug', 'elitebook')->first()->id;
        $modelVictus     = LaptopModel::where('slug', 'victus')->first()->id;
        $modelLatitude   = LaptopModel::where('slug', 'latitude')->first()->id;
        $modelPrecision  = LaptopModel::where('slug', 'precision')->first()->id;
        $modelSatellite  = LaptopModel::where('slug', 'satellite')->first()->id;
        $modelROG        = LaptopModel::where('slug', 'rog')->first()->id;
        $modelSurfacePro = LaptopModel::where('slug', 'surface-pro')->first()->id;
        $modelZedBook    = LaptopModel::where('slug', 'zedbook')->first()->id;
        $modelVaio       = LaptopModel::where('slug', 'vaio')->first()->id;

        // Brand Categories
        $catLenovo  = Category::where('slug', 'lenovo')->first()->id;
        $catHP      = Category::where('slug', 'hp')->first()->id;
        $catDell    = Category::where('slug', 'dell')->first()->id;
        $catToshiba = Category::where('slug', 'toshiba')->first()->id;
        $catAsus    = Category::where('slug', 'asus')->first()->id;
        $catSony    = Category::where('slug', 'sony')->first()->id;
        $catSurface = Category::where('slug', 'surface')->first()->id;
        $catILife   = Category::where('slug', 'ilife')->first()->id;

        $laptops = [
            // Lenovo
            ['category_id' => $catLenovo, 'laptop_model_id' => $modelIdeaPad, 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'price' => 550, 'details' => '', 'image' => 'img/laptops/laptop_lenovo_ideapad_1777718294494.png'],
            ['category_id' => $catLenovo, 'laptop_model_id' => $modelIdeaPad, 'model' => 'i7 13 Gen', 'ram' => '16GB', 'storage' => '512GB SSD', 'price' => 750, 'details' => '', 'image' => 'img/laptops/laptop_lenovo_ideapad_1777718294494.png'],
            ['category_id' => $catLenovo, 'laptop_model_id' => $modelThinkPad, 'model' => 'T490 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'price' => 320, 'details' => '', 'image' => 'img/laptops/laptop_lenovo_thinkpad_1777718313594.png'],
            ['category_id' => $catLenovo, 'laptop_model_id' => $modelThinkPad, 'model' => 'T450s i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'price' => 210, 'details' => '', 'image' => 'img/laptops/laptop_lenovo_thinkpad_1777718313594.png'],

            // HP
            ['category_id' => $catHP, 'laptop_model_id' => $modelVictus, 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'price' => 850, 'details' => 'RTX 3050 6GB VGA', 'image' => 'img/laptops/laptop_hp_victus_1777718328341.png'],
            ['category_id' => $catHP, 'laptop_model_id' => $modelEliteBook, 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'price' => 280, 'details' => '', 'image' => 'img/laptops/laptop_hp_elitebook_1777718404770.png'],
            ['category_id' => $catHP, 'laptop_model_id' => $modelEliteBook, 'model' => 'Mini Laptop i5 8 Gen', 'ram' => '8GB', 'storage' => '128GB', 'price' => 240, 'details' => '', 'image' => 'img/laptops/laptop_hp_elitebook_1777718404770.png'],

            // Dell
            ['category_id' => $catDell, 'laptop_model_id' => $modelLatitude, 'model' => '3420 i5 11 Gen', 'ram' => '16GB', 'storage' => '512GB', 'price' => 450, 'details' => '', 'image' => 'img/laptops/laptop_dell_latitude_1777718342814.png'],
            ['category_id' => $catDell, 'laptop_model_id' => $modelLatitude, 'model' => '5410 i5 10 Gen', 'ram' => '16GB', 'storage' => '256GB', 'price' => 380, 'details' => '', 'image' => 'img/laptops/laptop_dell_latitude_1777718342814.png'],
            ['category_id' => $catDell, 'laptop_model_id' => $modelPrecision, 'model' => '3530 i7 8 Gen', 'ram' => '16GB', 'storage' => '256GB', 'price' => 520, 'details' => '4GB VGA', 'image' => 'img/laptops/laptop_dell_precision_1777718358900.png'],

            // Others
            ['category_id' => $catAsus, 'laptop_model_id' => $modelROG, 'model' => 'i7 7 Gen', 'ram' => '16GB', 'storage' => '128GB SSD + 1TB HDD', 'price' => 650, 'details' => 'GTX 1050 4GB VGA', 'image' => 'img/laptops/laptop_asus_rog_1777718420102.png'],
            ['category_id' => $catSurface, 'laptop_model_id' => $modelSurfacePro, 'model' => 'i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'price' => 350, 'details' => '', 'image' => 'img/laptops/laptop_microsoft_surface_1777718434304.png'],
            ['category_id' => $catSony, 'laptop_model_id' => $modelVaio, 'model' => 'i5', 'ram' => '6GB', 'storage' => '2TB HDD', 'price' => 180, 'details' => '', 'image' => 'img/laptops/laptop_sony_vaio_1777718372184.png'],
            ['category_id' => $catToshiba, 'laptop_model_id' => $modelSatellite, 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'price' => 260, 'details' => '', 'image' => 'img/laptops/laptop_toshiba_satellite_1777718388986.png'],
            ['category_id' => $catILife, 'laptop_model_id' => $modelZedBook, 'model' => 'Intel Inside', 'ram' => '4GB', 'storage' => '128GB HDD', 'price' => 120, 'details' => '', 'image' => 'img/laptops/laptop_ilife_1777718447939.png'],
        ];

        foreach ($laptops as $laptop) {
            Laptop::create($laptop);
        }
    }
}
