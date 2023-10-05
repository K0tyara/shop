<?php

namespace App\Services\Contracts;

use App\Services\Abstracts\PreviewPreserver;

interface PreviewCreator
{
    function create(mixed $file): PreviewPreserver;
}
