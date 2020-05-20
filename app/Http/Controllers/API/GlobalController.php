<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\GlobalServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalRequests\Contact;
use App\Http\Requests\GlobalRequests\Menu;
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

    public function contactForm(Contact $request)
    {
        $response = $this->globalService->sendContactMessage($request->all());
        return $this->response($response);
    }
}
