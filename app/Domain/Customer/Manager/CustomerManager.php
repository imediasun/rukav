<?php

namespace App\Domain\Customer\Manager;


use App\Domain\Abstracts\Customer\CustomerAbstract;
use App\Domain\Customer\Contracts\CustomerContract;
use App\Domain\Customer\Repositories\CustomerRepositoryInterface;
use App\Domain\Customer\Services\CustomerServiceInterface;


class CustomerManager extends CustomerAbstract implements CustomerContract

{
    private $customerRepository;
    private $customerService;


    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     * @param $CompanyServiceInterface
     */
    public function __construct(CustomerRepositoryInterface $customerRepository,CustomerServiceInterface $customerService)
    {
        $this->customerRepository = $customerRepository;
         $this->customerService = $customerService;

    }


    /**
     * @param $customer
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateCustomer($customer)
    {

        $customer=$this->customerRepository->updateOrCreateCustomer($customer['attributes'],$customer['values']);

        return $customer;

    }

    public function deleteCustomer($customer)
    {
        return $this->customerRepository->deleteCustomer($customer);
    }


    public function updateMessage($message)
    {

        $message=$this->customerRepository->updateOrCreateMessage($message['attributes'],$message['values']);
        if($message){
        $customer=\App\User::where('id',$message->addressant)->first();
            $this->customerService->sendCustomerReceiveMessageNotification($customer);

        }
        return $message;

    }


}