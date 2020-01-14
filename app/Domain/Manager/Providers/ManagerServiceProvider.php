<?php

namespace App\Domain\Manager\Providers;

use App\Domain\Manager\Manager\ManagerManager;
use App\Domain\Manager\Models\Manager;
use App\Domain\Manager\Facades\Manager as ManagerFacade;

use App\Domain\Manager\Repositories\ManagerRepository;
use App\Domain\Manager\Services\ManagerService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

class ManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ManagerRepository::class, function ($app) {
            return new ManagerRepository(new Manager());
        });
        $this->app->bind(ManagerService::class, function ($app) {
            return new ManagerService();
        });
        $this->app->alias(ManagerRepository::class, 'manager_repo');

        $this->app->alias(ManagerService::class, 'manager_service');
        $this->app->bind(ManagerFacade::class, function () {
            return new ManagerManager(
                resolve('manager_repo'),resolve('manager_service')
            );
        });
        $this->app->alias(ManagerFacade::class, 'Manager');
    }
}