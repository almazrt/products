<?php

namespace App\DTO;

use JetBrains\PhpStorm\ArrayShape;

class CreatingProductDTO
{
    /**
     * @param array<int> $categoriesIds
     */
    public function __construct(
        public string $title,
        public float  $price,
        public bool   $isPublished,
        public array  $categoriesIds = [],
    )
    {
        //
    }

    #[ArrayShape([
        'title' => 'string',
        'price' => 'float',
        'isPublished' => 'bool',
        'categoriesIds' => 'array',
    ])]
    public static function fromArray(array $array): self
    {
        return new self(
            $array['title'],
            $array['price'],
            (bool)$array['isPublished'],
            $array['categoriesIds'] ?? [],
        );
    }
}
