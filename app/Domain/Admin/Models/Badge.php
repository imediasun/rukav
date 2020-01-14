<?php

namespace App\Domain\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'photo','name','group_id'

    ];

    public $timestamps = false;

    public function group(){
        return $this->hasOne('App\Domain\Admin\Models\BadgesGroup','id','group_id');
    }

}
