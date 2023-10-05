<?php

namespace App\Helpers;

use App\Services\Contracts\PreviewCreator;
use App\Services\Contracts\Storage as StorageContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaSaveHelper
{
    private StorageContract $storage;

    public function __construct(StorageContract $storage)
    {
        $this->storage = $storage;
    }

    function save(UploadedFile $file, PreviewCreator $preview, string $directory, string $originalName = null): array|bool
    {
        $extension = '.' . $file->getClientOriginalExtension();
        $originalName = ($originalName ? ($originalName . $extension) : $file->getClientOriginalName());
        $previewName = str_replace($extension, '_preview' . $extension, $originalName);

        $originalPath = $this->storage->save($file, $directory, $originalName);
        if (!$originalPath)
            return false;

        $previewPath = $directory . '/' . $previewName;
        $preview->create($file)->save(Storage::path($previewPath));

        return [
            'originalPath' => Storage::path($originalPath),
            'originalUrl' => Storage::url($originalPath),
            'previewPath' => Storage::path($previewPath),
            'previewUrl' => Storage::url($previewPath),
        ];
    }
}
