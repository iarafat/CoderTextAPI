<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\PageServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\Show;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    /**
     * @var PageServiceInterface
     */
    private $pageService;

    /**
     * PageController constructor.
     * @param PageServiceInterface $pageService
     */
    public function __construct(PageServiceInterface $pageService)
    {
        parent::__construct();

        $this->pageService = $pageService;
    }

    /**
     * @param Show $request
     * @return JsonResponse
     */
    public function show(Show $request)
    {
        $response = $this->pageService->show($request->slug);
        return $this->response($response);
    }
}
