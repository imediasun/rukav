<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Connect extends Model
{

    use Notifiable;


    protected $table='connects';
    protected $fillable = [
        'sender_id', 'message_id','receiver_id','text','is_viewed'

    ];

    public function message(){
        return $this->hasOne('App\Domain\Customer\Models\Message','id','message_id');

    }

    public function sender(){
        return $this->hasOne('App\User','id','sender_id');

    }

    public function receiver(){
        return $this->hasOne('App\User','id','receiver_id');

    }

    public function pictures(){
        return $this->hasOneThrough('App\Domain\Company\Models\Picture', 'App\Domain\Customer\Models\Message','id','id','message_id','id');


    }

    public function author(){
        return $this->hasOneThrough('App\User', 'App\Domain\Customer\Models\Message','id','id','message_id','sender');


    }

}
