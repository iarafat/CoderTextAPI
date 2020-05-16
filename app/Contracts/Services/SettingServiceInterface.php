<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;
use App\Exceptions\CustomException;

interface SettingServiceInterface
{
    /**
     * Get settings by group and keys
     *
     * @param $group
     * @param $keys
     * @return ServiceDTO
     * @throws CustomException
     */
    public function getSettingsByGroupAndKeys($group, $keys): ServiceDTO;

    /**
     * Get settings by group
     *
     * @param $group
     * @return ServiceDTO
     * @throws CustomException
     */
    public function getSettingsByGroup($group): ServiceDTO;

    /**
     * Get menus by name
     *
     * @param $name
     * @return ServiceDTO
     * @throws CustomException
     */
    public function getMenusByName($name): ServiceDTO;
}