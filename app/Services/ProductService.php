<?php

namespace App\Services;

use App\DTO\CreatingProductDTO;
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
        $product->categories()->attach($dto->categoriesIds);
    }
}
