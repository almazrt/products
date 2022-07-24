<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public const FIELD_ID = 'id';
    public const FIELD_TITLE = 'title';

    protected $fillable = [
        self::FIELD_TITLE,
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
