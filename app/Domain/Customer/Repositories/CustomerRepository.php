<?php


namespace App\Domain\Customer\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Customer\Models\Customer;


class CustomerRepository extends BaseCrudRepository implements CustomerRepositoryInterface
{

    protected $entityClass= Customer::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateCustomer($attributes,$values)
    {
         $this->entityClass= Customer::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteCustomer($customer)
    {
        $this->entityClass= Customer::class;
        return $this->delete($customer);
    }

}