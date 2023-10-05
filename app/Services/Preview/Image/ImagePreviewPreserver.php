<?php

namespace App\Services\Preview\Image;

use App\Services\Abstracts\PreviewPreserver;
use Intervention\Image\Exception\NotWritableException;

class ImagePreviewPreserver extends PreviewPreserver
{
    function save($path): string|bool
    {
        try {
            $this->file->save($path);
            return $path;
        } catch (NotWritableException $ex) {
            return false;
        }
    }
}
