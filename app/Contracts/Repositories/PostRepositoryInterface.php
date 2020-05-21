<?php


namespace App\Contracts\Repositories;


interface PostRepositoryInterface
{
    /**
     * Get posts with paginate
     *
     * @param int $limit
     */
    public function getPosts($limit = 9);

    /**
     * Get post by slug
     *
     * @param string $slug
     * @return array
     */
    public function getPostBySlug(string $slug): array;
}