<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory\StoreSubcategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {
        return view('Pages.Subcategory.index', [
            'subcategories' => SubcategoryResource::collection(Subcategory::query()
                ->with('parents:id,name')
                ->withCount('products')
                ->orderBy('created_at', 'desc')
                ->get()),
            'categories' => CategoryResource::collection(Category::query()
                ->get())
                ->resolve()
        ]);
    }

    public function store(StoreSubcategoryRequest $request)
    {
        Subcategory::query()
            ->create($request->all())
            ->parents()->sync($request->categories);

        return redirect()->route('admin.subcategory.index');
    }

    public function delete(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('admin.subcategory.index');
    }
}
