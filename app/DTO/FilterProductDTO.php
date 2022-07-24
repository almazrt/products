<?php

namespace App\DTO;

class FilterProductDTO
{
    public function __construct(
        public ?string $title,
        public ?int    $categoryId,
        public ?string $categoryName,
        public ?float  $priceFrom,
        public ?float  $priceTo,
        public ?bool   $isPublished,
        public ?bool   $isDeleted,
    )
    {
        //
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['title'] ?? null,
            $array['categoryId'] ?? null,
            $array['categoryName'] ?? null,
            $array['priceFrom'] ?? null,
            $array['priceTo'] ?? null,
            $array['isPublished'] ?? null,
            $array['isDeleted'] ?? null,
        );
    }
}
