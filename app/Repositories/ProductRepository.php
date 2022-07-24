<?php

namespace App\Repositories;

use App\DTO\CreatingProductDTO;
use App\DTO\FilterProductDTO;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ProductRepository
{
    /**
     * @return Collection&iterable<Product>
     */
    public function getProducts(FilterProductDTO $filterDto): Collection
    {
        return Product::query()
            ->when($filterDto->title, function (Builder $query, string $title) {
                $query->where(Product::FIELD_TITLE, 'LIKE', '%' . $title . '%');
            })
            ->when($filterDto->categoryId, function (Builder $query, int $categoryId) {
                $query->whereHas(Product::RELATION_CATEGORIES, function (Builder $query) use ($categoryId) {
                    $query->where(Category::FIELD_ID, $categoryId);
                });
            })
            ->when($filterDto->categoryName, function (Builder $query, string $categoryName) {
                $query->whereHas(Product::RELATION_CATEGORIES, function (Builder $query) use ($categoryName) {
                    $query->where(Category::FIELD_TITLE, 'LIKE', '%' . $categoryName . '%');
                });
            })
            ->when($filterDto->priceFrom, function (Builder $query, float $priceFrom) {
                $query->where(Product::FIELD_PRICE, '>=', $priceFrom);
            })
            ->when($filterDto->priceTo, function (Builder $query, float $priceTo) {
                $query->where(Product::FIELD_PRICE, '>=', $priceTo);
            })
            ->when($filterDto->isPublished, function (Builder $query, bool $isPublished) {
                $query->where(Product::FIELD_IS_PUBLISHED, $isPublished);
            })
            ->when($filterDto->isDeleted, function (Builder $query) {
                $query->whereNull(Product::FIELD_DELETED_AT);
            })
            ->get();
    }

    public function create(CreatingProductDTO $productDTO): Product
    {
        return Product::query()->create([
            Product::FIELD_TITLE => $productDTO->title,
            Product::FIELD_PRICE => $productDTO->price,
            Product::FIELD_IS_PUBLISHED => $productDTO->isPublished,
        ]);
    }

    public function update(Product $product, CreatingProductDTO $productDTO): void
    {
        $product->update([
            Product::FIELD_TITLE => $productDTO->title,
            Product::FIELD_PRICE => $productDTO->price,
            Product::FIELD_IS_PUBLISHED => $productDTO->isPublished,
        ]);
    }

    public function delete(int $productId): void
    {
        Product::query()->where(Product::FIELD_ID, $productId)->delete();
    }
}
