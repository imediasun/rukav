<?php

namespace App\Domain\Company\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'company_id','photo','name','active'

    ];
}
