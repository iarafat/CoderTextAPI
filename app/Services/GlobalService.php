<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\GlobalRepositoryInterface;
use App\Contracts\Services\GlobalServiceInterface;

class GlobalService implements GlobalServiceInterface
{

    /**
     * @var GlobalRepositoryInterface
     */
    protected $globalRepository;

    /**
     * GlobalService constructor.
     * @param GlobalRepositoryInterface $globalRepository
     */
    public function __construct(GlobalRepositoryInterface $globalRepository)
    {
        $this->globalRepository = $globalRepository;
    }

    /**
     * Get menus by name
     *
     * @param $name
     * @return ServiceDTO
     */
    public function getMenusByName($name): ServiceDTO
    {
        $menus = $this->globalRepository->getMenusByName($name);
        return new ServiceDTO('List of menus', 200, $menus);
    }
}