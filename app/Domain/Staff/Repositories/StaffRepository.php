<?php


namespace App\Domain\Staff\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Staff\Models\Role;
use App\Domain\Staff\Models\Staff;


class StaffRepository extends BaseCrudRepository implements StaffRepositoryInterface
{

    protected $entityClass= Staff::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateRole($attributes,$values)
    {
         $this->entityClass= Role::class;
        return $this->updateOrCreate($attributes,$values);
    }



}