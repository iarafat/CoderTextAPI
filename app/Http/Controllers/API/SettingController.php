<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\SettingServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Group;
use App\Http\Requests\Setting\GroupAndKeys;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    /**
     * @var SettingServiceInterface
     */
    protected $settingService;

    /**
     * SettingController constructor.
     * @param SettingServiceInterface $settingService
     */
    public function __construct(SettingServiceInterface $settingService)
    {
        parent::__construct();

        $this->settingService = $settingService;
    }

    /**
     * Get the settings by group and keys.
     *
     * @param GroupAndKeys $request
     * @return JsonResponse
     */
    public function getSettingsByGroupAndKeys(GroupAndKeys $request)
    {
        $response = $this->settingService->getSettingsByGroupAndKeys($request->group, $request->keys);
        return $this->response($response);
    }

    /**
     *  Get the settings by group
     *
     * @param Group $request
     * @return JsonResponse
     */
    public function getSettingsByGroup(Group $request)
    {
        $response = $this->settingService->getSettingsByGroup($request->group);
        return $this->response($response);
    }
}
