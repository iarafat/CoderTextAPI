<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Abstractions\ServiceException;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\SettingServiceInterface;
use App\Exceptions\CustomException;
use Exception;

class SettingService implements SettingServiceInterface
{
    /**
     * @var SettingRepositoryInterface
     */
    protected $settingRepository;

    /**
     * SettingService constructor.
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Get settings by group and keys
     *
     * @param $group
     * @param $keys
     * @return ServiceDTO
     * @throws CustomException
     */
    public function getSettingsByGroupAndKeys($group, $keys): ServiceDTO
    {
        try {
            $settings = $this->settingRepository->getSettingsByGroupAndKeys($group, $keys);
            return new ServiceDTO('List of settings', 200, $settings);
        } catch (Exception $exception) {
            ServiceException::throw($exception);
        }
    }

    /**
     * Get settings by group
     *
     * @param $group
     * @return ServiceDTO
     * @throws CustomException
     */
    public function getSettingsByGroup($group): ServiceDTO
    {
        try {
            $settings = $this->settingRepository->getSettingsByGroup($group);
            return new ServiceDTO('List of settings', 200, $settings);
        } catch (Exception $exception) {
            ServiceException::throw($exception);
        }
    }

    /**
     * Get menus by name
     *
     * @param $name
     * @return ServiceDTO
     * @throws CustomException
     */
    public function getMenusByName($name): ServiceDTO
    {
        try {
            $menus = $this->settingRepository->getMenusByName($name);
            return new ServiceDTO('List of menus', 200, $menus);
        } catch (Exception $exception) {
            ServiceException::throw($exception);
        }
    }
}