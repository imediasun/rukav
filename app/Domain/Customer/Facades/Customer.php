<?php
namespace App\Domain\Customer\Facades;

use Illuminate\Support\Facades\Facade;

class Customer extends Facade {

    protected static function getFacadeAccessor() { return 'Customer'; }

}