<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'article' => $this->article,
            'qty' => $this->qty,
            'created_at' => $this->created_at,
            'preview' => $this->whenHas('preview'),

            'category' => CategoryResource::make($this->whenLoaded('category')),
            'subcategory' => SubcategoryResource::make($this->whenLoaded('subcategory')),

            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'colors' => ColorResource::collection($this->whenLoaded('colors')),
        ];
    }
}
