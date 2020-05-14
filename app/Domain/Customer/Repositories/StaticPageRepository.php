<?php


namespace App\Domain\Customer\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Customer\Models\StaticPage;


class StaticPageRepository extends BaseCrudRepository implements StaticPageRepositoryInterface
{

    protected $entityClass= StaticPage::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateStaticPage($attributes,$values)
    {
         $this->entityClass= StaticPage::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteStaticPage($staticpage)
    {
        $this->entityClass= \App\Domain\Customer\Models\StaticPage::class;
        return $this->delete($staticpage);
    }


}