<?php


namespace App\Domain\Customer\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface MessageRepositoryInterface extends BaseCrudRepositoryInterface
{
    public function updateOrCreateMessage($attributes,$values);

    public function deleteMessage($customer);

}