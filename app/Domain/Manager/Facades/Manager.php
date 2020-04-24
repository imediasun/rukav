<?php
namespace App\Domain\Manager\Facades;

use Illuminate\Support\Facades\Facade;

class Manager extends Facade {

    protected static function getFacadeAccessor() { return 'Manager'; }

}