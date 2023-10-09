<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
//            'parent' => $this->whenLoaded('parent'),
            'children' => CategoryResource::collection($this->whenLoaded('children')),
            'subcategories' => SubcategoryResource::collection($this->whenLoaded('subcategories')),
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'products_count' => $this->whenCounted('products')
        ];
    }
}
