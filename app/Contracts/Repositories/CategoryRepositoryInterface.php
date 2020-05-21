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
     * @param $slug
     * @return
     */
    public function getCategoryWithPosts($slug);

    /**
     * Get category with products
     *
     * @param $slug
     * @return
     */
    public function getCategoryWithProducts($slug);
}