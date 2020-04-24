<?php


namespace App\Domain\Staff\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface StaffRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateRole($attributes,$values);

}