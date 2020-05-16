<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface SettingServiceInterface
{
    /**
     * Get settings by group and keys
     *
     * @param $group
     * @param $keys
     * @return ServiceDTO
     */
    public function getSettingsByGroupAndKeys($group, $keys): ServiceDTO;

    /**
     * Get settings by group
     *
     * @param $group
     * @return ServiceDTO
     */
    public function getSettingsByGroup($group): ServiceDTO;

    /**
     * Get menus by name
     *
     * @param $name
     * @return ServiceDTO
     */
    public function getMenusByName($name): ServiceDTO;
}