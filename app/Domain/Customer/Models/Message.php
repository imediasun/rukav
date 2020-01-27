<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = [
        'id', 'addressant','sender','company_id','title','message','badge_id'

    ];


    public function badge(){
        return $this->hasOne('App\Domain\Company\Models\Badge','id','badge_id');

    }
    public function getSender(){
        return $this->hasOne('App\User','id','sender');

    }
}
