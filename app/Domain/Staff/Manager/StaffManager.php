<?php

namespace App\Domain\Staff\Manager;


use App\Domain\Abstracts\Staff\StaffAbstract;
use App\Domain\Staff\Contracts\StaffContract;
use App\Domain\Staff\Repositories\StaffRepositoryInterface;


class StaffManager extends StaffAbstract implements StaffContract

{
    private $staffRepository;



    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     */
    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateStaffRole($role)
    {
        return $this->staffRepository->updateOrCreateRole($role['attributes'],$role['values']);
    }


}