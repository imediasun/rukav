<?php

namespace App\Domain\Company\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{

    use Notifiable;

    protected $table='companies';
    protected $fillable = [
        'name', 'email','info','phone','address','biling_address'

    ];

    public function admin(){
        return $this->hasOneThrough('App\User', 'App\AdminCompany','company_id','id','id','admin_id');
    }

    public function logo(){
        return $this->hasOne('App\Domain\Company\Models\Logo');

    }


}
