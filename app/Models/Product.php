<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    public const FIELD_ID = 'id';
    public const FIELD_TITLE = 'title';
    public const FIELD_PRICE = 'price';

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
