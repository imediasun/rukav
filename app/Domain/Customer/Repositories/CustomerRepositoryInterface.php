<?php


namespace App\Domain\Customer\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface CustomerRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateCustomer($attributes,$values);

    public function deleteCustomer($customer);

}