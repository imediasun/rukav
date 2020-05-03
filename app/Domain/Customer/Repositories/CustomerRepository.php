<?php


namespace App\Domain\Customer\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Models\Message;
use App\Domain\Customer\Models\Wishlist;


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

    public function updateOrCreateWishlist($attributes,$values)
    {
        $this->entityClass= Wishlist::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteCustomer($customer)
    {
        $this->entityClass= \App\User::class;
        return $this->delete($customer);
    }

    public function updateOrCreateMessage($attributes,$values)
    {
        $this->entityClass= Message::class;
        return $this->updateOrCreate($attributes,$values);
    }

}