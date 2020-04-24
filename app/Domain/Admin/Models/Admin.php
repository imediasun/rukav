<?php

namespace App\Domain\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admin extends Model
{

    protected $table='users';
    protected $fillable = [
        'name', 'email', 'password','active','manager_language','phone','remember_token','active','login','non_hashed'

    ];

    public function roles(){
        return $this->hasManyThrough('App\Domain\Staff\Models\Role', 'App\Domain\Staff\Models\ModelHasRole','model_id','id','id','role_id');
    }
}
