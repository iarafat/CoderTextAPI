<?php

namespace App\Http\Controllers\API;

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
     * PostController constructor.
     * @param PostServiceInterface $postService
     */
    public function __construct(PostServiceInterface $postService)
    {
        parent::__construct();

        $this->postService = $postService;
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
        return $this->response($response);
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
        return $this->response($response);
    }
}
