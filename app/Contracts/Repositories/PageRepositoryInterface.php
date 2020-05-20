<?php


namespace App\Contracts\Repositories;


interface PageRepositoryInterface
{
    /**
     * Get page by slug
     *
     * @param string $slug
     * @return array
     */
    public function getPageBySlug(string $slug): array;
}