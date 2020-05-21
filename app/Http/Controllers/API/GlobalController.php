<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\GlobalServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalRequests\Contact;
use App\Http\Requests\GlobalRequests\Menu;
use App\Http\Requests\GlobalRequests\Search;
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

    /**
     * Send contact email
     * 
     * @param Contact $request
     * @return JsonResponse
     */
    public function contactForm(Contact $request)
    {
        $response = $this->globalService->sendContactMessage($request->all());
        return $this->response($response);
    }


    /**
     * Search on products and posts tables
     *
     * @param Search $request
     * @return JsonResponse
     */
    public function search(Search $request)
    {
        $response = $this->globalService->search($request->input('query'), $request->input('page'));
        return $this->response($response);
    }
}
