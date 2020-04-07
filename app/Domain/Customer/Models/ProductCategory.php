<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $fillable = [
        'parent_id','name','icon','link','photo'

    ];
}
