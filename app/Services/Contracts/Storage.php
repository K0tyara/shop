<?php

namespace App\Services\Contracts;


use Illuminate\Http\UploadedFile;

interface Storage
{
    function save(mixed $file, string $directory, string $name = null): string|bool;
}
