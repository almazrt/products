<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatingCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryRepository $repository,
        private CategoryService    $service,
    )
    {
        //
    }

    public function store(CreatingCategoryRequest $request): Response
    {
        $this->repository->create($request->toDTO());

        return new JsonResponse(status: Response::HTTP_CREATED);
    }

    public function destroy(int $categoryId): Response
    {
        $this->service->delete($categoryId);

        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }
}
