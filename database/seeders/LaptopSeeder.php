<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Laptop;
use App\Models\Category;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        // Images
        $imgLenovoIdeaPad = 'img/laptops/laptop_lenovo_ideapad_1777718294494.png';
        $imgLenovoThinkPad = 'img/laptops/laptop_lenovo_thinkpad_1777718313594.png';
        $imgHPVictus = 'img/laptops/laptop_hp_victus_1777718328341.png';
        $imgHPEliteBook = 'img/laptops/laptop_hp_elitebook_1777718404770.png';
        $imgDellLatitude = 'img/laptops/laptop_dell_latitude_1777718342814.png';
        $imgDellPrecision = 'img/laptops/laptop_dell_precision_1777718358900.png';
        $imgSonyVaio = 'img/laptops/laptop_sony_vaio_1777718372184.png';
        $imgToshiba = 'img/laptops/laptop_toshiba_satellite_1777718388986.png';
        $imgAsusROG = 'img/laptops/laptop_asus_rog_1777718420102.png';
        $imgSurface = 'img/laptops/laptop_microsoft_surface_1777718434304.png';
        $imgILife = 'img/laptops/laptop_ilife_1777718447939.png';

        // Fetch categories to map them
        $catLenovo = Category::where('slug', 'lenovo')->first()->id;
        $catHP = Category::where('slug', 'hp')->first()->id;
        $catDell = Category::where('slug', 'dell')->first()->id;
        $catToshiba = Category::where('slug', 'toshiba')->first()->id;
        $catAsus = Category::where('slug', 'asus')->first()->id;
        $catSony = Category::where('slug', 'sony')->first()->id;
        $catSurface = Category::where('slug', 'surface')->first()->id;
        $catILife = Category::where('slug', 'ilife')->first()->id;

        $laptops = [
            ['category_id' => $catLenovo, 'brand' => 'Lenovo', 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'details' => '', 'image' => $imgLenovoIdeaPad],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo', 'model' => 'i7 13 Gen', 'ram' => '16GB', 'storage' => '512GB SSD', 'details' => '', 'image' => $imgLenovoIdeaPad],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo', 'model' => 'i7 8 Gen', 'ram' => '8GB', 'storage' => '512GB', 'details' => '', 'image' => $imgLenovoIdeaPad],
            ['category_id' => $catHP, 'brand' => 'HP Victus', 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'details' => 'RTX 3050 6GB VGA', 'image' => $imgHPVictus],
            ['category_id' => $catDell, 'brand' => 'Dell', 'model' => 'i5 7 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catDell, 'brand' => 'Dell', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catSony, 'brand' => 'Sony', 'model' => 'i5', 'ram' => '4GB', 'storage' => 'HDD', 'details' => '', 'image' => $imgSonyVaio],
            ['category_id' => $catSony, 'brand' => 'Sony', 'model' => 'i5', 'ram' => '6GB', 'storage' => '2TB HDD', 'details' => '', 'image' => $imgSonyVaio],
            ['category_id' => $catToshiba, 'brand' => 'Toshiba', 'model' => 'Pentium', 'ram' => '3GB', 'storage' => '512GB HDD', 'details' => '', 'image' => $imgToshiba],
            ['category_id' => $catHP, 'brand' => 'HP', 'model' => 'i5', 'ram' => '4GB', 'storage' => '512GB HDD', 'details' => '', 'image' => $imgHPEliteBook],
            ['category_id' => $catToshiba, 'brand' => 'Toshiba', 'model' => 'Pentium', 'ram' => '4GB', 'storage' => '500GB HDD', 'details' => '', 'image' => $imgToshiba],
            ['category_id' => $catILife, 'brand' => 'ILife', 'model' => 'Intel Inside', 'ram' => '4GB', 'storage' => '128GB HDD', 'details' => '', 'image' => $imgILife],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo', 'model' => 'i7', 'ram' => '8GB', 'storage' => '256GB SSD', 'details' => '', 'image' => $imgLenovoThinkPad],
            ['category_id' => $catToshiba, 'brand' => 'Toshiba', 'model' => 'Celeron', 'ram' => '4GB', 'storage' => '256GB SSD', 'details' => '', 'image' => $imgToshiba],
            ['category_id' => $catDell, 'brand' => 'Dell', 'model' => 'Core 2 Duo', 'ram' => '4GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo', 'model' => 'Celeron', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovoIdeaPad],
            ['category_id' => $catHP, 'brand' => 'HP', 'model' => 'Mini Laptop i5 8 Gen', 'ram' => '8GB', 'storage' => '128GB', 'details' => '', 'image' => $imgHPEliteBook],
            ['category_id' => $catHP, 'brand' => 'HP', 'model' => 'i5 8 Gen', 'ram' => '16GB', 'storage' => '512GB', 'details' => '', 'image' => $imgHPEliteBook],
            ['category_id' => $catDell, 'brand' => 'Dell Latitude', 'model' => '3420 i5 11 Gen', 'ram' => '16GB', 'storage' => '512GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo ThinkPad', 'model' => 'T490 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovoThinkPad],
            ['category_id' => $catDell, 'brand' => 'Dell Latitude', 'model' => '5480 i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catDell, 'brand' => 'Dell Latitude', 'model' => '5540 i5 4 Gen', 'ram' => '4GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catToshiba, 'brand' => 'Toshiba', 'model' => 'i7 5 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '2GB VGA', 'image' => $imgToshiba],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo ThinkPad', 'model' => 'T450s i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovoThinkPad],
            ['category_id' => $catDell, 'brand' => 'Dell Precision', 'model' => '3510 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '2GB VGA', 'image' => $imgDellPrecision],
            ['category_id' => $catDell, 'brand' => 'Dell Precision', 'model' => '3530 i7 8 Gen', 'ram' => '16GB', 'storage' => '256GB', 'details' => '4GB VGA', 'image' => $imgDellPrecision],
            ['category_id' => $catDell, 'brand' => 'Dell Latitude', 'model' => 'i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catLenovo, 'brand' => 'Lenovo ThinkPad', 'model' => 'T490s i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovoThinkPad],
            ['category_id' => $catHP, 'brand' => 'HP EliteBook', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgHPEliteBook],
            ['category_id' => $catDell, 'brand' => 'Dell Latitude', 'model' => '5410 i5 10 Gen', 'ram' => '16GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDellLatitude],
            ['category_id' => $catAsus, 'brand' => 'ASUS', 'model' => 'i7 7 Gen', 'ram' => '16GB', 'storage' => '128GB SSD + 1TB HDD', 'details' => 'GTX 1050 4GB VGA', 'image' => $imgAsusROG],
            ['category_id' => $catSurface, 'brand' => 'Microsoft Surface', 'model' => 'i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgSurface],
            ['category_id' => $catToshiba, 'brand' => 'Toshiba', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgToshiba],
        ];

        foreach ($laptops as $laptop) {
            Laptop::create($laptop);
        }
    }
}
