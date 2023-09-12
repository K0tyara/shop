<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\MediaType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\PreviewProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function last()
    {
        $products = Product::with(['media' => function ($q) {
            $q->where('type', MediaType::Image)
                ->select(['media.product_id', 'media.url_preview'])
                ->take(1);
        }])->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();


        return PreviewProductResource::collection($products);
    }
}
