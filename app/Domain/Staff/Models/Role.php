<?php

namespace App\Domain\Staff\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    protected $fillable = [
        'name', 'description'

    ];
}
