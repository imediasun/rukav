<?php

namespace App\Domain\Company\Providers;

use App\Domain\Company\Manager\CompanyManager;
use App\Domain\Company\Models\Company;
use App\Domain\Company\Facades\Company as CompanyFacade;

use App\Domain\Company\Repositories\CompanyRepository;
use App\Domain\Admin\Repositories\AdminRepository;
use App\Domain\Company\Services\CompanyService;
use App\Domain\Company\Services\CompanyServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

class CompanyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CompanyRepository::class, function ($app) {
            return new CompanyRepository(new Company());
        });
        $this->app->bind(AdminRepository::class, function ($app) {
            return new AdminRepository(new User());
        });
        $this->app->bind(CompanyService::class, function ($app) {
            return new CompanyService();
        });
        $this->app->alias(CompanyRepository::class, 'company_repo');
        $this->app->alias(AdminRepository::class, 'admin_repo');
        $this->app->alias(CompanyService::class, 'company_service');
        $this->app->bind(CompanyFacade::class, function () {
            return new CompanyManager(
                resolve('company_repo'),resolve('company_service'),resolve('admin_repo')
            );
        });
        $this->app->alias(CompanyFacade::class, 'Company');
    }
}