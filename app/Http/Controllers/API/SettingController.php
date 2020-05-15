<?php

namespace App\Http\Controllers\API;

use App\Abstractions\APIResponse;
use App\Contracts\Services\SettingServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingGroupAndKeysRequest;
use App\Http\Requests\SettingGroupRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    /**
     * @var SettingServiceInterface
     */
    protected $settingService;
    /**
     * @var APIResponse
     */
    protected $apiResponse;

    /**
     * SettingController constructor.
     * @param SettingServiceInterface $settingService
     * @param APIResponse $apiResponse
     */
    public function __construct(SettingServiceInterface $settingService, APIResponse $apiResponse)
    {
        $this->settingService = $settingService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * Get the settings by group and keys.
     *
     * @param SettingGroupAndKeysRequest $request
     * @return JsonResponse
     */
    public function getSettingsByGroupAndKeys(SettingGroupAndKeysRequest $request)
    {
        try {
            $response = $this->settingService->getSettingsByGroupAndKeys($request->group, $request->keys);
            return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
        } catch (Exception $exception) {
            return $this->apiResponse->errors($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     *  Get the settings by group
     *
     * @param SettingGroupRequest $request
     * @return JsonResponse
     */
    public function getSettingsByGroup(SettingGroupRequest $request)
    {
        try {
            $response = $this->settingService->getSettingsByGroup($request->group);
            return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
        } catch (Exception $exception) {
            return $this->apiResponse->errors($exception->getMessage(), $exception->getCode());
        }
    }
}
