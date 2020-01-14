<?php

namespace App\Domain\Manager\Manager;


use App\Domain\Abstracts\Manager\ManagerAbstract;
use App\Domain\Manager\Contracts\ManagerContract;
use App\Domain\Manager\Repositories\ManagerRepositoryInterface;
use App\Domain\Manager\Services\ManagerServiceInterface;


class ManagerManager extends ManagerAbstract implements ManagerContract

{
    private $managerRepository;
    private $managerService;


    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     * @param $CompanyServiceInterface
     */
    public function __construct(ManagerRepositoryInterface $managerRepository,ManagerServiceInterface $managerService)
    {
        $this->managerRepository = $managerRepository;
         $this->managerService = $managerService;

    }


    /**
     * @param $manager
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateManager($manager)
    {

        $manager=$this->managerRepository->updateOrCreateManager($manager['attributes'],$manager['values']);
        if($manager){
                $this->managerService->sendManagerRegistrationDoneNotification($manager);

        }
        return $manager;

    }

    public function deleteManager($manager)
    {
        return $this->managerRepository->deleteManager($manager);
    }



}