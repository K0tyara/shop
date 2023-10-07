<?php

namespace App\Http\Controllers;

use App\Enums\MediaType;
use App\Http\Requests\ProductIndexRequest;
use App\Http\Resources\Product\PreviewProductResource;
use App\Http\Resources\Product\ShowProductResource;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request)
    {
        $products = Product::query()
            ->with(['media' => function ($q) {
                $q->where('type', MediaType::Image)
                    ->select(['media.product_id', 'media.url_preview'])
                    ->take(1);
            }])
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($subQuery) use ($request) {
                    $subQuery->where('name', $request->category);
                });
            })
            ->when($request->subcategory, function ($query) use ($request) {
                $query->whereHas('subcategory', function ($subQuery) use ($request) {
                    $subQuery->where('name', $request->subcategory);
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Product/Templates/Index', [
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'products' => PreviewProductResource::collection($products),
        ]);
    }

    public function show(Product $product)
    {
        $product->load(['media', 'category', 'subcategories']);

        return Inertia::render('Product/Templates/Show', [
            'product' => ShowProductResource::make($product)
        ]);
    }
}
