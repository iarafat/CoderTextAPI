<?php

namespace App\Http\Controllers\API;

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
     * CategoryController constructor.
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        parent::__construct();

        $this->categoryService = $categoryService;
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
        return $this->response($response);
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
        return $this->response($response);
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
        return $this->response($response);
    }
}
