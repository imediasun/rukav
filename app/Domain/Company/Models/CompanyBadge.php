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

}
