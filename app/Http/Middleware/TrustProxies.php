<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
<<<<<<< HEAD
     * @var string
=======
     * @var int
>>>>>>> bb2e14deeb4d633551f707afda5306b9477d33d2
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
