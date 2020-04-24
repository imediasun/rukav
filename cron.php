<?php
error_reporting(error_reporting() & ~E_NOTICE & ~E_STRICT);

session_start();

/*define("SLIM_USE_ROUTER",false);
*/

//require_once 'config.php';
use \App\modules\Cron\Model\Service;



App\modules\Cron\Model\Service::getInstance()->process();
