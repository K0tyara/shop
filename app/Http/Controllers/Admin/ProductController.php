<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaType;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Media;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('Pages.Product.index', [
            'data' =>
                ProductResource::collection(Product::query()
                    ->with('category:id,name')
                    ->with('subcategories:id,name')
                    ->addSelect(['preview' => Media::query()
                        ->select('media.url_preview')
                        ->whereColumn('product_id', 'products.id')
                        ->where('type', MediaType::Image->value)
                        ->limit(1)
                    ])
                    ->paginate(20))
                    ->response()
                    ->getData(true)
        ]);
    }

    public function create()
    {
        return view('Pages.Product.create');
    }
}
