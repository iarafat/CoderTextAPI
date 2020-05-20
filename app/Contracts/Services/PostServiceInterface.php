<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface PostServiceInterface extends IndexableInterface
{
    /**
     * Get post by slug
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function show($slug): ServiceDTO;
}