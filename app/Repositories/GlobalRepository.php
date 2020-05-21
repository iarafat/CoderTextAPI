<?php


namespace App\Repositories;


use App\Contracts\Repositories\GlobalRepositoryInterface;
use App\Post;
use App\Product;
use App\Traits\Paginatable;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Searchable\Search;

class GlobalRepository implements GlobalRepositoryInterface
{
    use Paginatable;

    /**
     * Get menus by name
     *
     * @param string $name
     * @return array
     */
    public function getMenusByName(string $name): array
    {
        $resources = menu($name, '_json');
        return $resources->toArray();
    }

    /**
     * Search on products and posts tables
     *
     * @param $query
     * @param $page
     * @return LengthAwarePaginator
     */
    public function search($query, $page)
    {
        $searchResults = (new Search())
            ->registerModel(Product::class, ['price', 'title', 'body'])
            ->registerModel(Post::class, ['title', 'body'])
            ->search($query);
        return $this->paginate($searchResults, 9, $page);
    }


}