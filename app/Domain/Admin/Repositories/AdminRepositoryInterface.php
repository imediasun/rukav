<?php


namespace App\Domain\Admin\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface AdminRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateAdmin($attributes,$values);

    public function deleteAdmin($user);

    public function setAdminByEmail($email,$request);

    public function updateOrCreateAdminAvatar($attributes,$values);

    public function deleteAdminAvatar($ava);

    public function deleteBadgesGroup($badges_group);

}