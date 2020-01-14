<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    use Notifiable;

    protected $guard_name = 'web';

    protected $table='customers';
    protected $fillable = [
        'company_id','login','name','sername','email','department','info','phone','photo','address','password','non_hashed','active','position','manager_id','active'

    ];

}
