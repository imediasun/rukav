<?php

namespace App\Domain\User\Manager;


use App\Domain\Abstracts\User\UserAbstract;
use App\Domain\User\Contracts\UserContract;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Domain\User\Services\UserServiceInterface;

class UserManager extends UserAbstract implements UserContract

{
    private $userRepository;
    private $userService;



    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     */
    public function __construct(UserRepositoryInterface $userRepository,UserServiceInterface $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * @param $company
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateUser($user)
    {
         $user=$this->userRepository->updateOrCreateUser($user['attributes'],$user['values']);
        if($user){
            $this->userService->sendCustomerRegistrationDoneNotification($user);

        }
        return $user;
    }

    public function deleteUser($user)
    {
        return $this->userRepository->deleteUser($user);
    }


}