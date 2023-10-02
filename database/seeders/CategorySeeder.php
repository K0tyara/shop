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
            'bags',
            'glasses',
            'straps',
            'purses',
        ];

        Category::query()->insert(array_map(function ($item) {
            return ['name' => $item];
        }, $category));

        Category::query()->find(1)->children()->sync([1,2]);
        Category::query()->find(2)->children()->sync([1]);
    }
}
