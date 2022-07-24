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

    public function createWithCategories(CreatingProductDTO $dto): void
    {
        $product = $this->repository->create($dto);
        $this->attachCategories($product, $dto);
    }

    /**
     * @param array<int> $categoriesIds
     */
    public function attachCategories(Product $product, array $categoriesIds): void
    {
        $product->categories()->attach($categoriesIds);
    }
}
