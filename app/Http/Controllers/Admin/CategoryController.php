<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Pages.Category.index', [
            'categories' => CategoryResource::collection(Category::query()
                ->with('subcategories:id,name')
                ->withCount('products')
                ->orderBy('created_at', 'desc')
                ->get()),
            'subcategory' => SubcategoryResource::collection(Subcategory::query()
                ->get())
                ->resolve()
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create(
            $request->all(),
        )->subcategories()->sync($request->subcategories);

        return redirect()->route('admin.category.index');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
