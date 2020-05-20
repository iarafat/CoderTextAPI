<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Contracts\Services\PostServiceInterface;

class PostService implements PostServiceInterface
{
    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * PostService constructor.
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Get posts with paginate
     *
     * @return ServiceDTO
     */
    public function index(): ServiceDTO
    {
        $posts = $this->postRepository->getPosts();
        return new ServiceDTO('List of posts', 200, $posts);
    }

    /**
     * Get post by slug
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function show($slug): ServiceDTO
    {
        $post = $this->postRepository->getPostBySlug($slug);
        return new ServiceDTO('Post by slug', 200, $post);
    }
}