<?php


namespace App\Repositories;


use App\Abstractions\BaseRepository;
use App\Contracts\Repositories\PageRepositoryInterface;
use App\Page;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    /**
     * @var Page
     */
    protected $model;

    /**
     * PageRepository constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    /**
     * Get page by slug
     *
     * @param string $slug
     * @return array
     */
    public function getPageBySlug(string $slug): array
    {
        $resource = $this->getModel()
            ->active()
            ->where(['slug' => $slug])
            ->first();
        return $resource->toArray();
    }
}