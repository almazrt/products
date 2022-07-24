<?php

namespace App\DTO;

use JetBrains\PhpStorm\ArrayShape;

class CreatingCategoryDTO
{
    public function __construct(
        public string $title,
    )
    {
        //
    }

    #[ArrayShape([
        'title' => 'string',
    ])]
    public static function fromArray(array $array): self
    {
        return new self(
            $array['title'],
        );
    }
}
