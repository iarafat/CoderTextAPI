<?php


namespace App\Contracts\Repositories;


interface CategoryRepositoryInterface
{
    /**
     * Get categories by limit
     *
     * @param $limit
     * @return array
     */
    public function getCategoriesByLimit($limit): array;

    /**
     * Get category with posts
     *
     * @param $categoryId
     * @return array
     */
    public function getCategoryWithPosts($categoryId): array;

    /**
     * Get category with products
     *
     * @param $categoryId
     * @return array
     */
    public function getCategoryWithProducts($categoryId): array;
}