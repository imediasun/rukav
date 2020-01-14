<?php


namespace App\Domain\Manager\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface ManagerRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateManager($attributes,$values);

    public function deleteManager($manager);

}