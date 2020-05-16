<?php


namespace App\Repositories;


use App\Abstractions\BaseRepository;
use App\Contracts\Repositories\SettingRepositoryInterface;
use TCG\Voyager\Models\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * @var Setting
     */
    protected $model;

    /**
     * SettingRepository constructor.
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    /**
     * Get settings by group and keys
     * @param $group
     * @param $keys
     * @return array
     */
    public function getSettingsByGroupAndKeys($group, $keys): array
    {
        $keys = explode(',', $keys);
        $resources = $this->getModel()
            ->where('group', $group)
            ->whereIn('key', $keys)
            ->get();
        return $resources->toArray();
    }

    /**
     * Get settings by group
     * @param $group
     * @return array
     */
    public function getSettingsByGroup($group): array
    {
        $resources = $this->getModel()
            ->where('group', $group)
            ->get();
        return $resources->toArray();
    }

    /**
     * Get menus by name
     *
     * @param string $name
     * @return array
     */
    public function getMenusByName(string $name): array
    {
        $resources = menu($name, '_json');
        return $resources->toArray();
    }
}