<?php

namespace App\Http\Controllers;

use App\Abstractions\APIResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var APIResponse
     */
    private $apiResponse;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->apiResponse = new APIResponse();
    }

    /**
     * API response
     * @param $response
     * @return JsonResponse
     */
    protected function response($response)
    {
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }
}
