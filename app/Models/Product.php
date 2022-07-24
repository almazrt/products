<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public const FIELD_ID = 'id';
    public const FIELD_TITLE = 'title';
    public const FIELD_PRICE = 'price';
    public const FIELD_IS_PUBLISHED = 'is_published';
    public const FIELD_DELETED_AT = 'deleted_at';

    public const RELATION_CATEGORIES = 'categories';

    protected $fillable = [
        self::FIELD_TITLE,
        self::FIELD_PRICE,
        self::FIELD_IS_PUBLISHED,
    ];

    protected $casts = [
        self::FIELD_DELETED_AT
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
}
