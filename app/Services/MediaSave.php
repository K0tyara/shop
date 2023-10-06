<?php

namespace App\Services;

use App\Services\Contracts\PreviewCreator;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaSave
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    function save(UploadedFile $file, PreviewCreator $preview, string $directory, string $originalName = null): array|bool
    {
        $extension = '.' . $file->getClientOriginalExtension();
        $originalName = ($originalName ? ($originalName . $extension) : $file->getClientOriginalName());
        $previewName = str_replace($extension, '_preview' . $extension, $originalName);

        $originalPath = $this->filesystem->putFileAs($directory, $file, $originalName);
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
