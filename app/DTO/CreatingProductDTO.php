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
        public array  $categoriesIds = [],
    )
    {
        //
    }

    #[ArrayShape([
        'title' => 'string',
        'price' => 'float',
        'categoriesIds' => 'array',
    ])]
    public static function fromArray(array $array): self
    {
        return new self(
            $array['title'],
            $array['price'],
            $array['categoriesIds'] ?? [],
        );
    }
}
