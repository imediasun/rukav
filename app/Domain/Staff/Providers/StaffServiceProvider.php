<?php

namespace App\Domain\Staff\Providers;

use App\Domain\Staff\Manager\StaffManager;
use App\Domain\Staff\Models\Staff;
use App\Domain\Staff\Facades\Staff as StaffFacade;

use App\Domain\Staff\Repositories\StaffRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class StaffServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StaffRepository::class, function ($app) {
            return new StaffRepository(new Staff());
        });
        $this->app->alias(StaffRepository::class, 'staff_repo');
        $this->app->bind(StaffFacade::class, function () {
            return new StaffManager(
                resolve('staff_repo')
            );
        });
        $this->app->alias(StaffFacade::class, 'Staff');
    }
}