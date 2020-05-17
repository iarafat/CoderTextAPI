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
     * @param $categoryId
     * @return ServiceDTO
     */
    public function getCategoryWithPosts($categoryId): ServiceDTO;

    /**
     * Get category with products
     *
     * @param $categoryId
     * @return ServiceDTO
     */
    public function getCategoryWithProducts($categoryId): ServiceDTO;
}