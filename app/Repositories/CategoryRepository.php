<?php

namespace App\Repositories;

use App\DTO\CreatingCategoryDTO;
use App\Models\Category;

class CategoryRepository
{
    public function create(CreatingCategoryDTO $categoryDTO): Category
    {
        return Category::query()->create([
            Category::FIELD_TITLE => $categoryDTO->title,
        ]);
    }

    public function update(int $categoryId, CreatingCategoryDTO $categoryDTO): void
    {
        Category::query()->where(Category::FIELD_ID, $categoryId)
            ->update([
                Category::FIELD_TITLE => $categoryDTO->title,
            ]);
    }

    public function delete(int $categoryId): void
    {
        Category::query()->where(Category::FIELD_ID, $categoryId)->delete();
    }
}
