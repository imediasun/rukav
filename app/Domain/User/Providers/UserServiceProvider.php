<?php

namespace App\Domain\User\Providers;

use App\Domain\User\Manager\UserManager;
use App\User;
use App\Domain\User\Facades\User as UserFacade;
use App\Domain\User\Services\UserService;
use App\Domain\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });
        $this->app->bind(UserService::class, function ($app) {
            return new UserService();
        });
        $this->app->alias(UserRepository::class, 'user_repo');
        $this->app->alias(UserService::class, 'user_service');
        $this->app->bind(UserFacade::class, function () {
            return new UserManager(
                resolve('user_repo'),resolve('user_service')
            );
        });
        $this->app->alias(UserFacade::class, 'User');
    }
}