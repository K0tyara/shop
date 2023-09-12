<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Media\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreviewProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            'preview' => $this->whenLoaded('media', MediaResource::make($this->media[0] ?? null))
        ];
    }
}
