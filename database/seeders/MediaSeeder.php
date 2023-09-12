<?php

namespace Database\Seeders;

use App\Enums\MediaType;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Product::all() as $key => $product) {
            Media::factory(3)->for($product)->create();
            Media::factory(1)->for($product)->create(new Sequence(
                [
                    'type' => MediaType::Video,
                    'path_original' => 'https://placehold.co/1920x1080/red/white.mp4',
                    'url_original' => 'https://placehold.co/1920x1080/red/white.mp4',
                    'path_preview' => 'https://placehold.co/250x300?text=Video',
                    'url_preview' => 'https://placehold.co/250x300?text=Video   ',
                ]
            ));
        }
    }
}
