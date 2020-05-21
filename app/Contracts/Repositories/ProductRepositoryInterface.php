<?php


namespace App\Contracts\Repositories;


interface ProductRepositoryInterface
{
    /**
     * Get products with paginate
     *
     * @param int $limit
     */
    public function getProducts($limit = 9);

    /**
     * Get product by slug
     *
     * @param string $slug
     * @return array
     */
    public function getProductBySlug(string $slug): array;
}