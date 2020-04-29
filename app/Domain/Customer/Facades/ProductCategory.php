<?php
namespace App\Domain\Customer\Facades;

use Illuminate\Support\Facades\Facade;

class ProductCategory extends Facade {

    protected static function getFacadeAccessor() { return 'ProductCategory'; }

}