<?php

namespace App\Domain\Company\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'company_id','photo','name','active'

    ];

    public $timestamps = false;

}
