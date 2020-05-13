<?php


namespace App\Abstractions;


use App\Contracts\Repositories\BaseRepositoryInterface;
use Exception;
use Illuminate\{Database\Eloquent\Builder, Database\Eloquent\Model};

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Get resources by criteria
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $relation
     * @return array
     */
    public function getBy(array $criteria = [], $relation = null, array $orderBy = null): array
    {
        $collection = $this->prepareModelForRelationAndOrder($relation, $orderBy)->where($criteria)->get();
        return $collection->toArray();
    }

    /**
     * Preparing Model relation and Order
     *
     * @param $relation
     * @param array|null $orderBy [[Column], [Direction]]
     * @return Builder|Model
     */
    private function prepareModelForRelationAndOrder($relation, array $orderBy = null)
    {
        $model = $this->getModel();
        if ($relation) {
            $model = $model->with($relation);
        }

        if ($orderBy) {
            $model = $model->orderBy($orderBy['column'], $orderBy['direction']);
        }
        return $model;
    }

    /**
     * Get resources by selected columns
     *
     * @param array $columns ['one', 'two']
     * @return array
     */
    public function getBySelectedColumns(array $columns): array
    {
        if (count($columns)) {
            $collection = $this->getModel()->select($columns)->get();
            return $collection->toArray();
        }

        return $this->getAll();
    }

    /**
     * Retrieve all resource
     *
     * @param null $relation
     * @param array|null $orderBy
     * @return array
     */
    public function getAll($relation = null, array $orderBy = null): array
    {
        $collection = $this->prepareModelForRelationAndOrder($relation, $orderBy)->get();
        return $collection->toArray();
    }

    /**
     * Create a resource
     *
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        $resource = $this->getModel()->create($data);
        return $resource->toArray();
    }

    /**
     * Update resource
     *
     * @param $id
     * @param array $data
     * @return array
     */
    public function update($id, array $data = []): array
    {
        $resource = $this->getModel()->find($id);
        if (is_array($data) && count($data) > 0) {
            $resource->fill($data)->save();
        }
        return $resource->toArray();
    }

    /**
     * Find a resource by id
     *
     * @param $id
     * @param $relation
     * @return array
     */
    public function findOne($id, $relation = null): array
    {
        $resource = $this->prepareModelForRelationAndOrder($relation)->where(['id' => $id])->first();
        return $resource->toArray();
    }

    /**
     * Find resource by criteria
     *
     * @param array $criteria
     * @param null $relation
     * @return array
     */
    public function findOneBy(array $criteria = [], $relation = null): array
    {
        $resource = $this->prepareModelForRelationAndOrder($relation)->where($criteria)->first();
        return $resource->toArray();
    }

    /**
     * Find resources by ids
     *
     * @param array $ids
     * @return array
     */
    public function findByIds(array $ids): array
    {
        $collection = $this->getModel()->whereIn('id', $ids)->get();
        return $collection->toArray();
    }

    /**
     * Delete resource
     *
     * @param $id
     * @return boolean
     * @throws Exception
     */
    public function delete($id)
    {
        return $this->getModel()->find($id)->delete();
    }

    /**
     * Return Model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
}
