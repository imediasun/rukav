<?php

namespace App\Domain\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class BadgesGroup extends Model
{
    protected $fillable = [
        'name'

    ];

    public $timestamps = false;

    public function badges(){
        return $this->hasMany('App\Domain\Admin\Models\Badge','group_id','id');
    }

}
