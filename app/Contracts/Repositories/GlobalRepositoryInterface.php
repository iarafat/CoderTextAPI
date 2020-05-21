<?php


namespace App\Contracts\Repositories;


use Illuminate\Pagination\LengthAwarePaginator;

interface GlobalRepositoryInterface
{
    /**
     * Get menus by name
     *
     * @param string $name
     * @return array
     */
    public function getMenusByName(string $name): array;

    /**
     * Search on products and posts tables
     *
     * @param $query
     * @param $page
     * @return LengthAwarePaginator
     */
    public function search($query, $page);
}