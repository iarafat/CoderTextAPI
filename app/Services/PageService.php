<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\PageRepositoryInterface;
use App\Contracts\Services\PageServiceInterface;

class PageService implements PageServiceInterface
{
    /**
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * PageService constructor.
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Get page by slug
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function show($slug): ServiceDTO
    {
        $page = $this->pageRepository->getPageBySlug($slug);
        return new ServiceDTO('Page by slug', 200, $page);
    }
}