<?php

namespace App\Models;

use App\Services\MediaType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Media extends Model
{
    use HasFactory, HasEagerLimit;

    protected $table = 'media';

    protected $fillable = [
        'type',
        'path_original',
        'path_preview',
        'url_original',
        'url_preview',
    ];

    public $timestamps = false;
    protected $casts = [
        'type' => MediaType::class,
    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
