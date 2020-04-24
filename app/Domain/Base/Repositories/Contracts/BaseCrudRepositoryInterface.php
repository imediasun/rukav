<?php

namespace App\Domain\Base\Repositories\Contracts;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseCrudRepositoryInterface
 * @package App\Repositories\Base\Crud\Contracts
 */
interface BaseCrudRepositoryInterface
{
    /** Get or fail
     *
     * @param int $id
     * @return Model
     */
    public function getOrFail(int $id): Model;

    /**
     * @param int|null $limit
     *
     * @return Collection
     */
    public function getAllCollection(int $limit = null): Collection;

    /**
     * Get filtered collection
     *
     * @param array $search
     * @param int|null $limit
     * @return Collection
     */
    public function getFilteredCollection(array $search = [], int $limit = null): Collection;

    /**
     * Get filtered and paginated results
     *
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getFilteredAndPaginatedData(array $search = [], int $pageSize = 15): LengthAwarePaginator;

    /**
     * Create model
     *
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model;

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @return Model|null
     */
    public function update(Model $model, array $data): ?Model;

    /**
     * Create or update model entity
     *
     * @param array $attributes
     * @param array $values
     * @return Model|null
     */
    public function updateOrCreate(array $attributes, array $values): ?Model;

    /**
     * Delete model
     *
     * @param Model $model
     * @return bool
     * @throws Exception
     */
    public function delete(Model $model): bool;
}
