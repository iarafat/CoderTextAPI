<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface ProductServiceInterface extends IndexableInterface
{
    /**
     * Get product by slug
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function show($slug): ServiceDTO;
}