<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

session_start();
define('LARAVEL_START', microtime(true));
error_reporting( E_ERROR );


//Partner ID
if($_GET['bid']!="") {
    $partner_id='1000';
}
//Subid
if($_GET['subid']!="") {
    $subid=$_GET['subid'];
}
else{
    $subid=1;
}
if($subid!="") {
    setcookie("subid_credicom",$subid, time()+60*60*24*30, "/");
}
if(isset($_SERVER['HTTP_REFERER'])){
parse_str(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY), $queries);
$partner_id = $queries['partner_id'];
}
if(isset($_GET['partner_id']) && $_GET['partner_id']!="" || isset($partner_id)){
setcookie("partner_credicom",$partner_id, time()+60*60*24*30, "/");
if(isset($partner_id)){
	$_SESSION['partner_id']=$partner_id;
}
else{
	$_SESSION['partner_id']=$_GET['partner_id'];
}

}


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(

    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

