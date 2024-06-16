<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'image' => $this->faker->image('public/storage/products', 640, 480, null, false), // Generates a random image
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}