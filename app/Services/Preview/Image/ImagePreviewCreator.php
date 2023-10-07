<?php

namespace App\Services\Preview\Image;

use App\Services\Abstracts\PreviewPreserver;
use App\Services\Contracts\PreviewCreator;
use Intervention\Image\Facades\Image;

class ImagePreviewCreator implements PreviewCreator
{
    function create(mixed $file): PreviewPreserver
    {
        return new ImagePreviewPreserver(
            Image::make($file)
                ->fit(250, 300)
                ->orientate()
        );
    }
}
