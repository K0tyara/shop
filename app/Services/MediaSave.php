<?php

namespace App\Services;

use App\Enums\MediaType;
use App\Services\Contracts\PreviewCreator;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use LogicException;

class MediaSave
{
    private Filesystem $filesystem;
    private ?PreviewCreator $imagePreviewCreator;
    private ?PreviewCreator $videoPreviewCreator;

    public function __construct(Filesystem $filesystem, ?PreviewCreator $imagePreviewCreator, ?PreviewCreator $videoPreviewCreator)
    {
        $this->filesystem = $filesystem;
        $this->imagePreviewCreator = $imagePreviewCreator;
        $this->videoPreviewCreator = $videoPreviewCreator;
    }

    function save(array|UploadedFile $files, string $directory, string $product_id, bool $deleteIsError = true): array
    {
        if (!is_array($files)) {
            $files = [$files];
        }

        $results = [];

        $index = 1;
        foreach ($files as $file) {

            $extension = '.' . $file->getClientOriginalExtension();
            $mediaName = "product_media-$product_id-" . $index++ . $extension;
            $originalName = $this->filesystem->putFileAs($directory, $file, $mediaName);

            $previewName = str_replace($extension, '_preview' . $extension, $originalName);

            if (!$originalName) {
                if ($deleteIsError && count($results) > 0) {
                    $this->delete($results);
                }

                break;
            }

            if ($preview = $this->getPreviewCreator($file)) {
                $preview->create($file)->save(Storage::path($previewName));
            } else {
                $previewName = $originalName;
            }

            $results[] = [
                'type' => $this->getMediaType($file)->value,
                'product_id' => $product_id,
                'path_original' => Storage::path($originalName),
                'url_original' => Storage::url($originalName),
                'path_preview' => Storage::path($previewName),
                'url_preview' => Storage::url($previewName),
            ];

        }

        return $results;
    }

    private function delete($results): void
    {
        foreach ($results as $result) {
            if (isset($result['originalPath']))
                Storage::delete($result['originalPath']);
            if (isset($result['previewPath']))
                Storage::delete($result['previewPath']);
        }
    }

    private function getPreviewCreator(UploadedFile $file): PreviewCreator|null
    {
        $type = $file->getMimeType();
        if (str_starts_with($type, 'image'))
            return $this->imagePreviewCreator;
        else if (str_starts_with($type, 'video'))
            return $this->videoPreviewCreator;
        else
            throw new LogicException();
    }

    private function getMediaType(UploadedFile $file): MediaType
    {
        $type = $file->getMimeType();
        if (str_starts_with($type, 'image'))
            return MediaType::Image;
        else if (str_starts_with($type, 'video'))
            return MediaType::Video;
        else
            throw new LogicException();
    }
}
