<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $tag_count = Tag::count();
        $color_count = Color::count();
        Product::factory()->count(50)->create()->each(function ($product_item) use ($tag_count, $color_count, $faker) {
            $product_item->tags()->sync([$faker->numberBetween(1, $tag_count)]);
            $product_item->colors()->sync([$faker->numberBetween(1, $color_count)]);
        });
    }
}
