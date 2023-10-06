<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Media;
use App\Models\Product;
use App\Models\Subcategory;
use App\Services\MediaSave;
use App\Services\Preview\Image\ImagePreviewCreator;
use Illuminate\Support\Facades\Storage;

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
        return view('Pages.Product.create', [
            'categories' => CategoryResource::collection(Category::get())->resolve(),
            'subcategories' => SubcategoryResource::collection(Subcategory::get())->resolve(),
            'colors' => ColorResource::collection(Color::get())->resolve(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $file = $request->file('media')[0];
        dd((new MediaSave(Storage::disk('public')))->save($file, new ImagePreviewCreator(), '/images'));
    }
}
