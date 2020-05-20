<?php


namespace App\Repositories;


use App\Abstractions\BaseRepository;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * Get products with paginate
     *
     * @param int $limit
     * @return array
     */
    public function getProducts($limit = 9): array
    {
        $resources = $this->getModel()
            ->published()
            ->paginate($limit);
        return $resources->toArray();
    }

    /**
     * Get product by slug
     *
     * @param string $slug
     * @return array
     */
    public function getProductBySlug(string $slug): array
    {
        $resource = $this->getModel()->where(['slug' => $slug])->first();
        return $resource->toArray();
    }
}