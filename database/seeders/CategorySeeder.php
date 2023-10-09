<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            'Одяг',
            'Взуття',
            'Аксесуари',
        ];

        Category::query()->insert(array_map(function ($item) {
            return ['name' => $item];
        }, $category));

        Category::query()->find(1)->subcategories()->sync([1]);
        Category::query()->find(3)->subcategories()->sync([2]);
    }
}
