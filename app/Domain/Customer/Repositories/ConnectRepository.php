<?php


namespace App\Domain\Customer\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Customer\Models\Connect;
use App\Domain\Customer\Models\Message;


class ConnectRepository extends BaseCrudRepository implements ConnectRepositoryInterface
{

    protected $entityClass= Connect::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateConnect($attributes,$values)
    {
         $this->entityClass= Connect::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteConnect($Connect)
    {
        $this->entityClass= \App\User::class;
        return $this->delete($Connect);
    }


}