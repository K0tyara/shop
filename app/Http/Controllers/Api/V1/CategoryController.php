<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        $category = Category::query()->with('children')->get();
        return CategoryResource::collection($category);
    }
}
