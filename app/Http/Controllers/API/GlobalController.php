<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\GlobalServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Menu;
use Illuminate\Http\JsonResponse;

class GlobalController extends Controller
{
    /**
     * @var GlobalServiceInterface
     */
    protected $globalService;

    /**
     * GlobalController constructor.
     * @param GlobalServiceInterface $globalService
     */
    public function __construct(GlobalServiceInterface $globalService)
    {
        parent::__construct();

        $this->globalService = $globalService;
    }

    /**
     * Get the menus by name
     *
     * @param Menu $request
     * @return JsonResponse
     */
    public function getMenusByName(Menu $request)
    {
        $response = $this->globalService->getMenusByName($request->menu);
        return $this->response($response);
    }
}
