<?php


namespace App\Traits;


use Illuminate\Pagination\LengthAwarePaginator;

trait Paginatable
{
    public function paginate($items, $perPage = 15, $page = 1, $routeName = 'search')
    {
        $results = collect($items)->slice(($page - 1) * $perPage, $perPage);

        $paginator = new LengthAwarePaginator($results, count($items), $perPage, $page);

        $paginator->setPath(route($routeName));

        return $paginator;
    }
}