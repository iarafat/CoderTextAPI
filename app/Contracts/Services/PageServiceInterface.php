<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface PageServiceInterface
{
    /**
     * Get page by slug
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function show($slug): ServiceDTO;
}