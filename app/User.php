<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'admin';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','active','manager_language','phone','remember_token','login','department','non_hashed'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCompany(){
        return $this->hasManyThrough('App\Domain\Company\Models\Company', 'App\AdminCompany','admin_id','id','id','company_id');

    }

}
