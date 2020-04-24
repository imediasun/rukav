<?php

namespace App\Domain\Company\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
     'photo','message_id'

    ];

    public $timestamps = false;

}
