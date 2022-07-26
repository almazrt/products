<?php

namespace App\Http\Controllers;

use App\DTO\FilterProductDTO;
use App\Http\Requests\CreatingProductRequest;
use App\Http\Requests\FilterProductRequest;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService    $service,
        private ProductRepository $repository,
    )
    {
        //
    }

    public function index(FilterProductRequest $request): Response
    {
        $products = $this->repository->getProducts($request->toDTO());

        return new JsonResponse($products);
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

    public function destroy(int $productId): Response
    {
        $this->repository->delete($productId);

        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }
}
