<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Media\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowProductResource extends JsonResource
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
            'article' => $this->article,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'qty' => $this->qty,
            'category' => $this->whenLoaded('category', $this->category->name ?? null),
            'subcategory' => $this->whenLoaded('subcategory', $this->subcategory->name ?? null),
            'media' => $this->whenLoaded('media', MediaResource::collection($this->media ?? []))
        ];
    }
}
