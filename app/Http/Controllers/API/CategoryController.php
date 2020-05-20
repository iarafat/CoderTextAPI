<?php

namespace App\Http\Controllers\API;

use App\Abstractions\APIResponse;
use App\Contracts\Services\CategoryServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Category;
use App\Http\Requests\Category\GetCategory;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * @var CategoryServiceInterface
     */
    protected $categoryService;
    /**
     * @var APIResponse
     */
    protected $apiResponse;

    /**
     * CategoryController constructor.
     * @param CategoryServiceInterface $categoryService
     * @param APIResponse $apiResponse
     */
    public function __construct(CategoryServiceInterface $categoryService, APIResponse $apiResponse)
    {
        $this->categoryService = $categoryService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * Get categories by limit
     *
     * @param Category $request
     * @return JsonResponse
     */
    public function getCategoriesByLimit(Category $request)
    {
        $response = $this->categoryService->getCategoriesByLimit($request->limit);
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }

    /**
     * Get category with posts
     *
     * @param GetCategory $request
     * @return JsonResponse
     */
    public function getCategoryWithPosts(GetCategory $request)
    {
        $response = $this->categoryService->getCategoryWithPosts($request->category_id);
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }

    /**
     * Get category with products
     *
     * @param GetCategory $request
     * @return JsonResponse
     */
    public function getCategoryWithProducts(GetCategory $request)
    {
        $response = $this->categoryService->getCategoryWithProducts($request->category_id);
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }
}
