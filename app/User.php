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
        'name', 'sername','email', 'password','active','manager_language','phone','remember_token','login','department','non_hashed','company_id'

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

    public function getCustomersCompany(){
        return $this->hasOne('App\Domain\Customer\Models\Customer');

    }

    public function getCompanyBadges(){
        return $this->hasMany('App\Domain\Company\Models\CompanyBadge', 'company_id','company_id');

    }

    public function collegues(){
        return $this->hasMany('App\User', 'company_id','company_id');
    }


    public function manager(){

        return $this->hasOneThrough('App\Domain\Manager\Models\Manager', 'App\Domain\Customer\Models\Customer','user_id','id','id','manager_id');

    }



}
