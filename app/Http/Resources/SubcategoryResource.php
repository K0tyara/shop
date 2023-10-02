<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
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

            'parents' => CategoryResource::collection($this->whenLoaded('parents')),
            'parents_count' => $this->whenCounted('parents'),

            'products' => ProductResource::collection($this->whenLoaded('products')),
            'products_count' => $this->whenCounted('products'),
        ];
    }
}
