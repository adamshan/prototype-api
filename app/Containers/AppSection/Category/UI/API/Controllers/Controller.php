<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Requests\GetAllCategoriesRequest;
use App\Containers\AppSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Containers\AppSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\AppSection\Category\Actions\CreateCategoryAction;
use App\Containers\AppSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\AppSection\Category\Actions\GetAllCategoriesAction;
use App\Containers\AppSection\Category\Actions\UpdateCategoryAction;
use App\Containers\AppSection\Category\Actions\DeleteCategoryAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createCategory(CreateCategoryRequest $request): JsonResponse
    {
        $category = app(CreateCategoryAction::class)->run($request);
        return $this->created($this->transform($category, CategoryTransformer::class));
    }

    public function findCategoryById(FindCategoryByIdRequest $request): array
    {
        $category = app(FindCategoryByIdAction::class)->run($request);
        return $this->transform($category, CategoryTransformer::class);
    }

    public function getAllCategories(GetAllCategoriesRequest $request): array
    {
        $categories = app(GetAllCategoriesAction::class)->run($request);
        return $this->transform($categories, CategoryTransformer::class);
    }

    public function updateCategory(UpdateCategoryRequest $request): array
    {
        $category = app(UpdateCategoryAction::class)->run($request);
        return $this->transform($category, CategoryTransformer::class);
    }

    public function deleteCategory(DeleteCategoryRequest $request): JsonResponse
    {
        app(DeleteCategoryAction::class)->run($request);
        return $this->noContent();
    }
}
