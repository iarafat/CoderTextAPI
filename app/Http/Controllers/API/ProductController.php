<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\ProductServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Index;
use App\Http\Requests\Product\Show;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    protected $productService;

    /**
     * ProductController constructor.
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        parent::__construct();

        $this->productService = $productService;
    }

    /**
     * Get products with paginate
     *
     * @param Index $request
     * @return JsonResponse
     */
    public function index(Index $request)
    {
        $response = $this->productService->index();
        return $this->response($response);
    }

    /**
     * Get product by slug
     *
     * @param Show $request
     * @return JsonResponse
     */
    public function show(Show $request)
    {
        $response = $this->productService->show($request->slug);
        return $this->response($response);
    }
}
