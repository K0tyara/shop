<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductIndexRequest;
use App\Http\Resources\Product\PreviewProductResource;
use App\Http\Resources\Product\ShowProductResource;
use App\Models\Product;
use App\Services\MediaType;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request)
    {
        $products = Product::with(['media' => function ($q) {
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

    public function show(string $slug)
    {
        $product = Product::query()->where('slug', $slug)
            ->with([
                'media',
                'category',
                'subcategory',
            ])->first();

        if (!$product)
            abort(404);

        return Inertia::render('Product/Templates/Show', [
            'product' => ShowProductResource::make($product)
        ]);
    }
}
