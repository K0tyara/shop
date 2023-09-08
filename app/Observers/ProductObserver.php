<?php

namespace App\Observers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function creating(Product $product): void
    {
        $product->slug = Str::slug($product->title, '_');
        if (!$product->article)
            $product->article = (substr((string)Carbon::now()->unix(), 5, 5));
    }

}
