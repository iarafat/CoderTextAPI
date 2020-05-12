<?php


namespace App\Contracts\Repositories;


interface BaseRepositoryInterface
{
    public function getAll($relation = null, array $orderBy = null): array;

    public function getBy(array $criteria = [], $relation = null, array $orderBy = null): array;

    public function getBySelectedColumns(array $columns): array;

    public function create(array $data): array;

    public function update($id, array $data = []): array;

    public function findOne($id, $relation = null): array;

    public function findOneBy(array $criteria = [], $relation = null): array;

    public function findByIds(array $ids): array;

    public function delete($id);

    public function getModel();
}
