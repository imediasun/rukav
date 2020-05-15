<?php


namespace App\Domain\Customer\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface StaticPageRepositoryInterface extends BaseCrudRepositoryInterface
{
    public function updateOrCreateStaticPage($attributes,$values);

    public function deleteStaticPage($customer);

}