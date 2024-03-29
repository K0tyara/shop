<?php

namespace Database\Factories;

use App\Models\Category;
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
        $category_count = Category::count();
        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text,
            'qty' => $this->faker->numberBetween(0, 15),
            'price' => $this->faker->randomFloat(1, 0, 1000),
            'category_id' => $this->faker->numberBetween(1, $category_count),
            'article' => $this->faker->unique()->ean8(),
        ];
    }
}
