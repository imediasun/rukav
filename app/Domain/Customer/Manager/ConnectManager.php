<?php

namespace App\Domain\Customer\Manager;


use App\Domain\Abstracts\Customer\ConnectAbstract;
use App\Domain\Customer\Contracts\ConnectContract;
use App\Domain\Customer\Repositories\ConnectRepositoryInterface;
use App\Domain\Customer\Services\ConnectServiceInterface;


class ConnectManager extends ConnectAbstract implements ConnectContract

{
    private $connectRepository;
    private $connectService;


    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     * @param $CompanyServiceInterface
     */
    public function __construct(ConnectRepositoryInterface $connectRepository,ConnectServiceInterface $connectService)
    {
        $this->connectRepository = $connectRepository;
         $this->connectService = $connectService;

    }


    public function updateConnect($message)
    {

        $message=$this->connectRepository->updateOrCreateConnect($message['attributes'],$message['values']);
        if($message){
        $user=\App\User::where('id',$message->sender_id)->first();
            $this->connectService->sendCustomerEmailNotification($user);

        }
        return $message;

    }


}