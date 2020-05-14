<?php

namespace App\Domain\Customer\Providers;

use App\Domain\Customer\Manager\StaticPageManager;
use App\Domain\Customer\Models\StaticPage;
use App\Domain\Customer\Facades\StaticPage as StaticPageFacade;

use App\Domain\Customer\Repositories\StaticPageRepository;
use App\Domain\Customer\Services\StaticPageService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

class StaticPageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StaticPageRepository::class, function ($app) {
            return new StaticPageRepository(new StaticPage());
        });
        $this->app->bind(StaticPageService::class, function ($app) {
            return new StaticPageService();
        });
        $this->app->alias(StaticPageRepository::class, 'staticpage_repo');

        $this->app->alias(StaticPageService::class, 'staticpage_service');
        $this->app->bind(StaticPageFacade::class, function () {
            return new StaticPageManager(
                resolve('staticpage_repo'),resolve('staticpage_service')
            );
        });
        $this->app->alias(StaticPageFacade::class, 'StaticPage');
    }
}