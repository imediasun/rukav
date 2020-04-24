<?php


namespace App\Domain\User\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface UserRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateUser($attributes,$values);

    public function deleteUser($user);

    public function setUserByEmail($email);

}