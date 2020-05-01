<?php


namespace App\Domain\Customer\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface ConnectRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateConnect($attributes,$values);

    public function deleteConnect($customer);

}