<?php

namespace App\Domain\Customer\Providers;

use App\Domain\Customer\Manager\CustomerManager;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Facades\Customer as CustomerFacade;

use App\Domain\Customer\Repositories\CustomerRepository;
use App\Domain\Customer\Services\CustomerService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

class CustomerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CustomerRepository::class, function ($app) {
            return new CustomerRepository(new Customer());
        });
        $this->app->bind(CustomerService::class, function ($app) {
            return new CustomerService();
        });
        $this->app->alias(CustomerRepository::class, 'customer_repo');

        $this->app->alias(CustomerService::class, 'customer_service');
        $this->app->bind(CustomerFacade::class, function () {
            return new CustomerManager(
                resolve('customer_repo'),resolve('customer_service')
            );
        });
        $this->app->alias(CustomerFacade::class, 'Customer');
    }
}