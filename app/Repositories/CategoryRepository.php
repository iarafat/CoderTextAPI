<?php


namespace App\Repositories;


use App\Abstractions\BaseRepository;
use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get categories by limit
     *
     * @param $limit
     * @return array
     */
    public function getCategoriesByLimit($limit): array
    {
        $resources = $this->getModel()
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('order')
            ->limit($limit)
            ->get();
        return $resources->toArray();
    }

    /**
     * Get category with posts
     *
     * @param $categoryId
     * @return array
     */
    public function getCategoryWithPosts($categoryId): array
    {
        $resource = $this->getModel()->find($categoryId);
        $resource = $resource->setRelation('posts', $resource->posts()->paginate(9));
        return $resource->toArray();
    }

    /**
     * Get category with products
     *
     * @param $categoryId
     * @return array
     */
    public function getCategoryWithProducts($categoryId): array
    {
        $resource = $this->getModel()->find($categoryId);
        $resource = $resource->setRelation('products', $resource->products()->paginate(9));
        return $resource->toArray();
    }
}