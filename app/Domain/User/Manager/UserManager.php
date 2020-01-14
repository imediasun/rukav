<?php

namespace App\Domain\User\Manager;


use App\Domain\Abstracts\User\UserAbstract;
use App\Domain\User\Contracts\UserContract;
use App\Domain\User\Repositories\UserRepositoryInterface;


class UserManager extends UserAbstract implements UserContract

{
    private $userRepository;



    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $company
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateUser($user)
    {
        return $this->userRepository->updateOrCreateUser($user['attributes'],$user['values']);
    }

    public function deleteUser($user)
    {
        return $this->userRepository->deleteUser($user);
    }


}