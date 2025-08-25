<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    

         public function run(): void
    {
        // Ensure we have an Admin or SuperAdmin
        $adminOrSuper = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['SuperAdmin', 'Admin']);
        })->first();

        // $customer = User::role('Customer')->get(); // if you ever need customers

        // Ensure we have categories
        $categories = Category::all();

        if (!$adminOrSuper || $categories->isEmpty()) {
            // If roles/users/categories weren’t seeded yet, just stop quietly to avoid errors.
            return;
        }

        // Create 30 products, each linked to admin/super and a random category
        Product::factory(30)->create([
    'user_id' => $adminOrSuper->id,
    'category_id' => $categories->random()->id,
]);

    }
}
