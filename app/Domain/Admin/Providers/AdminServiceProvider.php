<?php

namespace App\Domain\Admin\Providers;

use App\Domain\Admin\Manager\AdminManager;
use App\Domain\Admin\Models\Admin;
use App\Domain\Admin\Facades\Admin as AdminFacade;

use App\Domain\Admin\Repositories\AdminRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AdminRepository::class, function ($app) {
            return new AdminRepository(new Admin());
        });
        $this->app->alias(AdminRepository::class, 'admin_repo');
        $this->app->bind(AdminFacade::class, function () {
            return new AdminManager(
                resolve('admin_repo')
            );
        });
        $this->app->alias(AdminFacade::class, 'Admin');
    }
}