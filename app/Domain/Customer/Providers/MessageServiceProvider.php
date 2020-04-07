<?php

namespace App\Domain\Customer\Providers;

use App\Domain\Customer\Manager\MessageManager;
use App\Domain\Customer\Models\Message;
use App\Domain\Customer\Facades\Message as MessageFacade;

use App\Domain\Customer\Repositories\MessageRepository;
use App\Domain\Customer\Services\MessageService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

class MessageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MessageRepository::class, function ($app) {
            return new MessageRepository(new Message());
        });
        $this->app->bind(MessageService::class, function ($app) {
            return new MessageService();
        });
        $this->app->alias(MessageRepository::class, 'message_repo');

        $this->app->alias(MessageService::class, 'message_service');
        $this->app->bind(MessageFacade::class, function () {
            return new MessageManager(
                resolve('message_repo'),resolve('message_service')
            );
        });
        $this->app->alias(MessageFacade::class, 'Message');
    }
}