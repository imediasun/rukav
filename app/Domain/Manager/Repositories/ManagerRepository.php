<?php


namespace App\Domain\Manager\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Manager\Models\Manager;


class ManagerRepository extends BaseCrudRepository implements ManagerRepositoryInterface
{

    protected $entityClass= Manager::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateManager($attributes,$values)
    {
         $this->entityClass= Manager::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteManager($manager)
    {
        $this->entityClass= Manager::class;
        return $this->delete($manager);
    }

}