<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
