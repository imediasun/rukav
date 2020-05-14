<?php

namespace App\Domain\Customer\Manager;


use App\Domain\Abstracts\Customer\StaticPageAbstract;
use App\Domain\Customer\Contracts\StaticPageContract;
use App\Domain\Customer\Repositories\StaticPageRepositoryInterface;
use App\Domain\Customer\Services\StaticPageServiceInterface;


class StaticPageManager extends StaticPageAbstract implements StaticPageContract

{
    private $staticpageRepository;
    private $staticpageService;


    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     * @param $CompanyServiceInterface
     */
    public function __construct(StaticPageRepositoryInterface $staticpageRepository,StaticPageServiceInterface $staticpageService)
    {
        $this->staticpageRepository = $staticpageRepository;
         $this->staticpageService = $staticpageService;

    }


    public function deleteStaticPage($staticpage)
    {
        return $this->staticpageRepository->deleteStaticPage($staticpage);
    }


    public function updateStaticPage($staticpage)
    {
		\Log::info('updateStaticPage: '.date("Y-m-d H:i:s"));
        $staticpage=$this->staticpageRepository->updateOrCreateStaticPage($staticpage['attributes'],$staticpage['values']);
        if($staticpage && $staticpage['attributes']['id'] ){
        $customer=\App\User::where('id',$staticpage->sender)->first();
            $this->staticpageService->sendCustomerReceiveStaticPageNotification($customer);

        }
        return $staticpage;

    }


}