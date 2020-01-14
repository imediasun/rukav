<?php

namespace App\Domain\Manager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Manager extends Model
{

    use Notifiable;

    protected $table='managers';
    protected $fillable = [
        'user_id','company_id','login','department','info','photo','address','active',

    ];

}
