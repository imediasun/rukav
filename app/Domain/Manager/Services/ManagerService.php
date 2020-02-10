<?php

namespace App\Domain\Manager\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Manager\Services\ManagerServiceInterface;
use App\Domain\Manager\Models\Manager;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\ManagerRegistrationDone;

class ManagerService implements ManagerServiceInterface

{


    public function sendManagerRegistrationDoneNotification(Manager $manager)
    {
        $user=\App\User::where('id',$manager->user_id)->first();
        return $user->notify(new ManagerRegistrationDone($manager));
    }

    public function sendNotification(Model $manager)
    {

        $manager->notify(new ManagerRegistrationDone($manager));

    }

    public function sendMessageNotification(Model $manager)
    {

        $manager->notify(new ManagerRegistrationDone($manager));

    }


}