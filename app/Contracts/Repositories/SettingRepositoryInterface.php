<?php


namespace App\Contracts\Repositories;


interface SettingRepositoryInterface
{
    /**
     * Get settings by group and keys
     * @param $group
     * @param $keys
     * @return array
     */
    public function getSettingsByGroupAndKeys($group, $keys): array;

    /**
     * Get settings by group
     * @param $group
     * @return array
     */
    public function getSettingsByGroup($group): array;
}