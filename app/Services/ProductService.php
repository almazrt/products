<?php

namespace App\Services;

use App\DTO\CreatingProductDTO;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(
        private ProductRepository $repository
    )
    {
        //
    }

    public function createWithCategories(CreatingProductDTO $productDTO): void
    {
        $product = $this->repository->create($productDTO);
        $this->attachCategories($product, $productDTO->categoriesIds);
    }

    /**
     * @param array<int> $categoriesIds
     */
    public function attachCategories(Product $product, array $categoriesIds): void
    {
        $product->categories()->attach($categoriesIds);
    }

    public function updateWithCategories(int $productId, CreatingProductDTO $productDTO): void
    {
        /** @var Product $product $product */
        $product = Product::query()->findOrFail($productId);
        $this->repository->update($product, $productDTO);
        $product->categories()->delete();
        $this->attachCategories($product, $productDTO->categoriesIds);
    }
}
