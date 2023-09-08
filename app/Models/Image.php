<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagetable_id',
        'imagetable_type',
        'path_original',
        'path_preview',
        'url_original',
        'url_preview',
    ];

    public function imagetable(): MorphTo
    {
        return $this->morphTo();
    }
}
