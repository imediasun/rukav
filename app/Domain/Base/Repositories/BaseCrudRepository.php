<?php

namespace App\Domain\Base\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class BaseCrudRepository
 * @package App\Repositories\Base\Crud
 */
class BaseCrudRepository implements BaseCrudRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass;

    /**
     * BaseRepository constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if (is_null($this->entityClass) || !class_exists($this->entityClass)) {
            throw new Exception("Entity class must be set and exist in:" . get_class($this));
        }
    }

    /**
     * Get or fail
     *
     * @param int $id
     * @return Model
     */
    public function getOrFail(int $id): Model
    {
        return $this->getQuery()->findOrFail($id);
    }

    /**
     * @param int|null $limit
     *
     * @return Collection
     */
    public function getAllCollection(int $limit = null): Collection
    {
        return $this->getFilteredCollection([], $limit);
    }

    /**
     * Get filtered collection
     *
     * @param array $search
     * @param int|null $limit
     * @return Collection
     */
    public function getFilteredCollection(array $search = [], int $limit = null): Collection
    {
        $query = $this->getFilteredQuery($search);

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query->get();
    }

    /**
     * Get filtered and paginated results
     *
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getFilteredAndPaginatedData(array $search = [], int $pageSize = 15): LengthAwarePaginator
    {
        return $this->getFilteredQuery($search)->paginate($pageSize);
    }

    /**
     * Create model
     *
     * @param array $data
     * @return Model|null
     * @throws Exception
     */
    public function create(array $data): ?Model
    {
        /** @var Model $model */
        $model = resolve($this->entityClass);

        if (!$model->fill($data)->save()) {
            throw new Exception("Error while creating model");
        }

        $model->refresh();
        return $model;
    }

    /**
     * Create or update model entity
     *
     * @param array $attributes
     * @param array $values
     * @return Model|null
     */
    public function updateOrCreate(array $attributes, array $values): ?Model
    {
        return $this->getQuery()->updateOrCreate($attributes, $values);
    }

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @return Model|null
     * @throws Exception
     */
    public function update(Model $model, array $data): ?Model
    {
        if (!$model->fill($data)->save()) {
            throw new Exception("Error while updating model");
        }

        $model->refresh();
        return $model;
    }

    /**
     * Delete model
     *
     * @param Model $model
     * @return bool
     * @throws Exception
     */
    public function delete(Model $model): bool
    {
        return !is_null($model->delete());
    }

    /**
     * Get query with filtering
     *
     * @param array $search
     * @return Builder
     */
    protected function getFilteredQuery(array $search = []): Builder
    {
        return $this->getQuery()->orderBy('id', 'desc');
    }

    /**
     * Get query
     *
     * @return Builder
     */
    protected function getQuery(): Builder
    {
        return call_user_func("{$this->entityClass}::query");
    }
}
