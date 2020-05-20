<?php


namespace App\Repositories;


use App\Contracts\Repositories\GlobalRepositoryInterface;

class GlobalRepository implements GlobalRepositoryInterface
{
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