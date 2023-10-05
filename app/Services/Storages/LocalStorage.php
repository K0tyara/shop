<?php

namespace App\Services\Storages;

use App\Services\Contracts\Storage as ContractStorage;
use Illuminate\Support\Facades\Storage;

class LocalStorage implements ContractStorage
{
    function save(mixed $file, string $directory, string $name = null): string|bool
    {
        $path = Storage::disk('public')->putFileAs($directory, $file, $name);
        if (!$path)
            return false;
        return $path;
    }
}
