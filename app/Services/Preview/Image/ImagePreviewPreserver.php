<?php

namespace App\Services\Preview\Image;

use App\Services\Abstracts\PreviewPreserver;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Exception\NotWritableException;

class ImagePreviewPreserver extends PreviewPreserver
{
    function save($path): string|bool
    {
        try {
            $this->file->save($path);
            return $path;
        } catch (NotWritableException $ex) {
            Log::error('Error save preview image. Path: ' . $path);
            throw  $ex;
        }
    }
}
