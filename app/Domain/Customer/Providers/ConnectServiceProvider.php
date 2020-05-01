<?php

namespace App\Domain\Customer\Providers;

use App\Domain\Customer\Manager\ConnectManager;
use App\Domain\Customer\Models\Connect;
use App\Domain\Customer\Facades\Connect as ConnectFacade;

use App\Domain\Customer\Repositories\ConnectRepository;
use App\Domain\Customer\Services\ConnectService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

class ConnectServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ConnectRepository::class, function ($app) {
            return new ConnectRepository(new Connect());
        });
        $this->app->bind(ConnectService::class, function ($app) {
            return new ConnectService();
        });
        $this->app->alias(ConnectRepository::class, 'Connect_repo');

        $this->app->alias(ConnectService::class, 'Connect_service');
        $this->app->bind(ConnectFacade::class, function () {
            return new ConnectManager(
                resolve('Connect_repo'),resolve('Connect_service')
            );
        });
        $this->app->alias(ConnectFacade::class, 'Connect');
    }
}