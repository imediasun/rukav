<?php

namespace App\Domain\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'user_id','photo','name','active'

    ];

    public $timestamps = false;

}
