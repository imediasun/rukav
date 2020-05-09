<?php

namespace App\Domain\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Wishlist extends Model
{

    use Notifiable;


    protected $table='wishlists';
    protected $fillable = [
        'user_id', 'active','message_id'

    ];

}
