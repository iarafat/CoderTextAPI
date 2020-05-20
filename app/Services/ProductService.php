<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * Get products with paginate
     *
     * @return ServiceDTO
     */
    public function index(): ServiceDTO
    {
        $products = $this->productRepository->getProducts();
        return new ServiceDTO('List of products', 200, $products);
    }

    /**
     * Get product by slug
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function show($slug): ServiceDTO
    {
        $product = $this->productRepository->getProductBySlug($slug);
        return new ServiceDTO('Product by slug', 200, $product);
    }
}