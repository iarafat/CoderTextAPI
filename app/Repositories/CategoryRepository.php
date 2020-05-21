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
     * @param $slug
     * @return
     */
    public function getCategoryWithPosts($slug)
    {
        return $this->getModel()
            ->where(['slug' => $slug])
            ->first()
            ->posts()
            ->paginate(9);
    }

    /**
     * Get category with products
     *
     * @param $slug
     * @return
     */
    public function getCategoryWithProducts($slug)
    {
        return $this->getModel()
            ->where(['slug' => $slug])
            ->first()
            ->products()
            ->paginate(9);
    }
}