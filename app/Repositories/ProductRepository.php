<?php

namespace App\Repositories;

use App\DTO\CreatingProductDTO;
use App\Models\Product;

class ProductRepository
{
    public function create(CreatingProductDTO $productDTO): Product
    {
        return Product::query()->create([
            Product::FIELD_TITLE => $productDTO->title,
            Product::FIELD_PRICE => $productDTO->price,
        ]);
    }

    public function update(Product $product, CreatingProductDTO $productDTO): void
    {
        $product->update([
                Product::FIELD_TITLE => $productDTO->title,
                Product::FIELD_PRICE => $productDTO->price,
            ]);
    }

    public function delete(int $productId): void
    {
        Product::query()->where(Product::FIELD_ID, $productId)->delete();
    }
}
