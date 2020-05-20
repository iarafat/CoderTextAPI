<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface GlobalServiceInterface
{
    /**
     * Get menus by name
     *
     * @param $name
     * @return ServiceDTO
     */
    public function getMenusByName($name): ServiceDTO;
}