<?php declare(strict_types=1);

use Mowazir\Framework\Http\Kernel;
use Mowazir\Framework\Http\Request;
use Mowazir\Framework\Http\Response;

define('BASE_PATH', dirname(__DIR__));


require_once dirname(__DIR__) . '/vendor/autoload.php' ;

$request = Request::createFromGlobals();


$kernel = new Kernel();

$response = $kernel->handle($request);


$response->send();
