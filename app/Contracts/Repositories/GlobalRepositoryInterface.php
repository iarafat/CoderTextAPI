<?php


namespace App\Contracts\Repositories;


interface GlobalRepositoryInterface
{
    /**
     * Get menus by name
     *
     * @param string $name
     * @return array
     */
    public function getMenusByName(string $name): array;
}