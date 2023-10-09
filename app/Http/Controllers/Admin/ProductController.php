<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SubcategoryResource;
use App\Http\Resources\TagResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Media;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Services\MediaSave;

class ProductController extends Controller
{
    public function index()
    {
        return view('Pages.Product.index', [
            'data' =>
                ProductResource::collection(Product::query()
                    ->with('category:id,name')
                    ->with('subcategory:id,name')
                    ->with('tags:id,name')
                    ->addSelect(['preview' => Media::query()
                        ->select('media.url_preview')
                        ->whereColumn('product_id', 'products.id')
                        ->where('type', MediaType::Image->value)
                        ->limit(1)
                    ])
                    ->orderBy('created_at', 'desc')
                    ->paginate(20))
                    ->response()
                    ->getData(true)
        ]);
    }

    public function edit(Product $product)
    {
        $product->load([
            'colors:id,hex',
            'subcategory:id,name',
            'category:id,name',
            'tags:id,name',
        ]);

        return view('Pages.Product.edit', [
            'product' => ProductResource::make($product),
            'categories' => CategoryResource::collection(Category::with('subcategories')->get())->resolve(),
            'colors' => ColorResource::collection(Color::get()),
            'tags' => TagResource::collection(Tag::get()),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->colors()->sync($request->colors);
        $product->subcategories()->sync($request->subcategories);

        return redirect()->route('admin.product.index');
    }

    public function create()
    {
        return view('Pages.Product.create', [
            'tags' => TagResource::collection(Tag::get())->resolve(),
            'categories' => CategoryResource::collection(Category::with('subcategories')->get())->resolve(),
            'colors' => ColorResource::collection(Color::get())->resolve(),
        ]);
    }

    public function store(StoreProductRequest $request, MediaSave $mediaSave)
    {
        $product = Product::query()->create($request->all());
        $product->colors()->sync($request->colors);
        $product->subcategories()->sync($request->subcategories);
        $media = $mediaSave->save($request->file('media'), 'media', $product->id);
        Media::insert($media);

        return redirect()->route('admin.product.index');
    }
}
