<?php

namespace App\Domain\Base\Services;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;
use App\Domain\Base\Services\Contracts\BaseCrudServiceInterface;
use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


use App\Domain\Company\Models\Company;
/**
 * Class BaseCrudService
 * @package App\Services\Base\Crud
 */
class BaseCrudService implements BaseCrudServiceInterface, BaseServiceInterface
{


    /**
     * @var BaseCrudRepositoryInterface
     */
    protected $repository;

    /**
     * BaseCrudService constructor.
     * @param BaseCrudRepositoryInterface $repository
     */
    public function __construct(BaseCrudRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get filtered results
     *
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getAll(array $search = [], int $pageSize = 15): LengthAwarePaginator
    {
        return $this->repository->getFilteredAndPaginatedData($search, $pageSize);
    }

    /**
     * Get all data as collection
     *
     * @param array $search
     * @return Collection
     */
    public function getAllCollection(array $search = []): Collection
    {
        return $this->repository->getFilteredCollection($search);
    }

    /**
     * Create model
     *
     * @param array $data
     * @throws Exception
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        return $this->repository->create($data);
    }

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @throws Exception
     * @return Model|null
     */
    public function update(Model $model, array $data): ?Model
    {
        return $this->repository->update($model, $data);
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
        return $this->repository->delete($model);
    }


}
