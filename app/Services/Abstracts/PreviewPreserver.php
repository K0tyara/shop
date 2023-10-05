<?php

namespace App\Services\Abstracts;

abstract class PreviewPreserver
{
    protected mixed $file;

    public function __construct(mixed $file)
    {
        $this->file = $file;
    }

    abstract function save($path): string|bool;
}
