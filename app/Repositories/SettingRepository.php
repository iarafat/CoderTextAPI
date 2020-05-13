<?php


namespace App\Repositories;


use App\Abstractions\BaseRepository;
use App\Contracts\Repositories\SettingRepositoryInterface;
use TCG\Voyager\Models\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    protected $model;

    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function getSettings($group, $keys)
    {
        $keys = explode(',', $keys);
        $resources = $this->getModel()->where('group', $group)->whereIn('key', $keys)->get();
        return $resources->toArray();
    }
}