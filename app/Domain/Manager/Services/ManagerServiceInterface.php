<?php


namespace App\Domain\Manager\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\User;
use App\Domain\Manager\Models\Manager;


interface ManagerServiceInterface extends BaseServiceInterface
{

    public function sendManagerRegistrationDoneNotification(Manager $manager);


}