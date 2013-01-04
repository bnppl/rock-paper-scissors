<?php

use Util\HttpRequest as HttpRequest;
use Util\Config as Config;
use Util\DB as DB;
use Controller\Controller;

include '../src/Util/bootstrap.php';


/* this file needs to be refactored by adding a router and dispatcher, for the current 
 * requirements this is sufficient 
 */

$request = HttpRequest::createFromGlobals();

/* this could go into a boot strapping class */
$env = getenv('ENV')? getenv('ENV') : 'dev';
$config = Config::loadFromPHPFile(DOCUMENT_ROOT.'src/Config/config_'.$env.'.php');

DB::createInstance($config->get('db_dsn'), $config->get('db_user'), $config->get('db_password'));

$controller = new Controller();


/* this would be handled by the router / dispatcher */
$route = substr($request->getHeader('REQUEST_URI'), 0, strpos($request->getHeader('REQUEST_URI'), '?'));

switch ($route)
{
    case '/':
        $content = $controller->indexAction($request);
        break;
    case '/challenge':
        $content = $controller->challengeAction($request);
        break;
    
}

echo $content;
