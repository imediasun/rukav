<?php

namespace App\Domain\Company\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'company_id','photo','name','active','description','link'

    ];

    public $timestamps = false;

}
