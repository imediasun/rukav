<?php

namespace App\Domain\Customer\Manager;


use App\Domain\Abstracts\Customer\MessageAbstract;
use App\Domain\Customer\Contracts\MessageContract;
use App\Domain\Customer\Repositories\MessageRepositoryInterface;
use App\Domain\Customer\Services\MessageServiceInterface;


class MessageManager extends MessageAbstract implements MessageContract

{
    private $messageRepository;
    private $messageService;


    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     * @param $CompanyServiceInterface
     */
    public function __construct(MessageRepositoryInterface $messageRepository,MessageServiceInterface $messageService)
    {
        $this->messageRepository = $messageRepository;
         $this->messageService = $messageService;

    }


    public function deleteMessage($message)
    {
        return $this->messageRepository->deleteMessage($message);
    }


    public function updateMessage($message)
    {
		\Log::info('updateMessage: '.date("Y-m-d H:i:s"));
        $message=$this->messageRepository->updateOrCreateMessage($message['attributes'],$message['values']);
        if($message && $message['attributes']['id'] ){
        $customer=\App\User::where('id',$message->sender)->first();
            $this->messageService->sendCustomerReceiveMessageNotification($customer);

        }
        return $message;

    }


}