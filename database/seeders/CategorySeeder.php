<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Fashion',
            'Home & Kitchen',
            'Health & Beauty',
            'Sports & Outdoors',
            'Books',
        ];

        foreach ($categories as $category) {
           $newCategory = Category::firstOrCreate(['name' => $category], ['name' => $category]);
            // dump($newCategory->name);

            // foreach ($categories as $name) {
            // Category::create(['name' => $name]);
        }
        // }
    }
}
