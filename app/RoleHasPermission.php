<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    //

    public function permission_item()
    {
        return $this->hasOne('App\Permission','id','permission_id');
    }
}
