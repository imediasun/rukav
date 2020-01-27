<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Model
{

    use Notifiable;


    protected $table='customers';
    protected $fillable = [
        'user_id', 'company_id','department','info','phone','photo','address','active','position','manager_id','active','birth_date','start_date','sex','location'

    ];

}
