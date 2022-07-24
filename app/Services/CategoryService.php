<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Database\QueryException;

class CategoryService
{
    public function __construct(private CategoryRepository $repository)
    {
        //
    }

    /**
     * @throws Exception
     */
    public function delete(int $categoryId): void
    {
        try {
            $this->repository->delete($categoryId);
        } catch (QueryException $e) {
            if (str_contains($e->getMessage(), 'Foreign key violation')) {
                throw new Exception('Попытка удалить не пустую категорию!');
            } else {
                throw $e;
            }
        }
    }
}
