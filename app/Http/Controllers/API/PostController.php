<?php

namespace App\Http\Controllers\API;

use App\Abstractions\APIResponse;
use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Index;
use App\Http\Requests\Post\Show;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @var PostServiceInterface
     */
    protected $postService;
    /**
     * @var APIResponse
     */
    protected $apiResponse;

    /**
     * PostController constructor.
     * @param PostServiceInterface $postService
     * @param APIResponse $apiResponse
     */
    public function __construct(PostServiceInterface $postService, APIResponse $apiResponse)
    {
        $this->postService = $postService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * Get posts with paginate
     *
     * @param Index $request
     * @return JsonResponse
     */
    public function index(Index $request)
    {
        $response = $this->postService->index();
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }

    /**
     * Get post by slug
     *
     * @param Show $request
     * @return JsonResponse
     */
    public function show(Show $request)
    {
        $response = $this->postService->show($request->slug);
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }
}
