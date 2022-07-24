<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatingProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $service,
    )
    {
        //
    }

    public function store(CreatingProductRequest $request): Response
    {
        $this->service->createWithCategories($request->toDTO());

        return new JsonResponse(status: Response::HTTP_CREATED);
    }

    public function update(CreatingProductRequest $request, int $productId): Response
    {
        $this->service->updateWithCategories($productId, $request->toDTO());

        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }
}
