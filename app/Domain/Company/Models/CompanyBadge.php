<?php

namespace App\Domain\Company\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyBadge extends Model
{
    protected $table="company_badges";
    protected $fillable = [
        'company_id','badges_group_id','active'

    ];

    public $timestamps = false;

    public function badges(){
        return $this->hasMany('App\Domain\Company\Models\Badge','group_id','badges_group_id');

    }

    public function group(){
        return $this->hasOne('App\Domain\Admin\Models\BadgesGroup','id','badges_group_id');

    }

}
