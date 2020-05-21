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

    /**
     * Send contact email
     *
     * @param array $inputs
     * @return ServiceDTO
     */
    public function sendContactMessage(array $inputs): ServiceDTO;

    /**
     * Search on products and posts tables
     *
     * @param $query
     * @param $page
     * @return ServiceDTO
     */
    public function search($query, $page): ServiceDTO;
}