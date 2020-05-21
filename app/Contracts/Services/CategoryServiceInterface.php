<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface CategoryServiceInterface
{
    /**
     * Get categories by limit
     *
     * @param $limit
     * @return ServiceDTO
     */
    public function getCategoriesByLimit($limit): ServiceDTO;

    /**
     * Get category with posts
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function getCategoryWithPosts($slug): ServiceDTO;

    /**
     * Get category with products
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function getCategoryWithProducts($slug): ServiceDTO;
}