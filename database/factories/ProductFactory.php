<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->words(3, true),
            'sku'         => strtoupper($this->faker->unique()->bothify('PROD-###??')),
            'description' => $this->faker->sentence(15),
            'price'       => $this->faker->randomFloat(2, 10, 500),
            'stock'       => $this->faker->numberBetween(1, 50),

            // ✅ Use consistent fake images (instead of random two ways)
            'image'       => 'https://picsum.photos/300?random=' . $this->faker->unique()->numberBetween(1, 100),

            // ✅ Attach category + admin automatically
            'category_id' => Category::inRandomOrder()->first()->id ?? null,
            'user_id'     => User::whereHas('roles', function ($q) {
                                $q->whereIn('name', ['SuperAdmin', 'Admin']);
                            })->inRandomOrder()->first()->id ?? 1,
        ];

       

    //     return [
    //     'name' => $this->faker->words(3, true),
    //     'description' => $this->faker->sentence(15),
    //     'price' => $this->faker->randomFloat(2, 10, 500),
    //     'stock' => $this->faker->numberBetween(1,50),
    //     'image' => 'https://picsum.photos/300?random=' . $this->faker->unique()->numberBetween(1, 100), // fake images
    // ];
    }
}
