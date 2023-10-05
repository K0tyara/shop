<?php

namespace App\Services\Preview;

use App\Services\Contracts\PreviewCreator;

class VideoPreviewCreator implements PreviewCreator
{
    function create(string $path): mixed
    {
        return  $path;
    }
}
