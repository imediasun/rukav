<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable = [
        'id', 'category_id','sender','company_id','title','message','active','badge_id','visibility','place_id','city','administrative'

    ];


    public function badge(){
        return $this->hasOne('App\Domain\Company\Models\Badge','id','badge_id');

    }
    public function getSender(){
        return $this->hasOne('App\User','id','sender');

    }
    public function getAddressant(){
        return $this->hasOne('App\User','id','addressant');

    }
    public function manager(){

     return $this->hasOneThrough('App\Domain\Manager\Models\Manager', 'App\Domain\Customer\Models\Customer','user_id','id','addressant','manager_id');

    }

    public function pictures(){
        return $this->hasOne('App\Domain\Company\Models\Picture','message_id','id');

    }
}
