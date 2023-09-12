<?php

namespace Database\Factories;

use App\Models\Media;
use App\Services\MediaType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Media::class;
    public function definition(): array
    {
        return [
            'type' => MediaType::Image,

            'path_original' => 'https://placehold.co/1900x1200',
            'url_original' => 'https://placehold.co/520x720',
            
            'path_preview' => 'https://placehold.co/1900x1200',
            'url_preview' => 'https://placehold.co/250x300',
        ];
    }
}
