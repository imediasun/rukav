<?php


namespace App\Domain\Customer\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Customer\Models\Message;


class MessageRepository extends BaseCrudRepository implements MessageRepositoryInterface
{

    protected $entityClass= Message::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateMessage($attributes,$values)
    {
         $this->entityClass= Message::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteMessage($message)
    {
        $this->entityClass= \App\Domain\Customer\Models\Message::class;
        return $this->delete($message);
    }


}