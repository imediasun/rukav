<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 2019-11-15
 * Time: 16:41
 */

namespace App\Domain\Base\Services\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseCrudServiceInterface
 * @package App\Services\Base\Crud\Contracts
 */
interface BaseCrudServiceInterface
{
    /**
     * Get filtered results
     *
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getAll(array $search = [], int $pageSize = 15): LengthAwarePaginator;

    /**
     * Get all data as collection
     *
     * @param array $search
     * @return Collection
     */
    public function getAllCollection(array $search = []): Collection;

    /**
     * Create entity
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
     * Delete model
     *
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model): bool;
}
