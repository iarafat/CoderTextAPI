<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{

    /**
     * Display the specified setting.
     * @param SettingRequest $request
     */
    public function getSettingsByGroup(SettingRequest $request)
    {
        $request->toArray();
        setting();
    }
}
