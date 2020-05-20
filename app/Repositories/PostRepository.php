<?php


namespace App\Repositories;


use App\Abstractions\BaseRepository;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    protected $model;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Get posts with paginate
     *
     * @param int $limit
     * @return array
     */
    public function getPosts($limit = 9): array
    {
        $resources = $this->getModel()
            ->published()
            ->paginate($limit);
        return $resources->toArray();
    }

    /**
     * Get post by slug
     *
     * @param string $slug
     * @return array
     */
    public function getPostBySlug(string $slug): array
    {
        $resource = $this->getModel()->where(['slug' => $slug])->first();
        return $resource->toArray();
    }
}