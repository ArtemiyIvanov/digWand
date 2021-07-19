<?php

require './vendor/autoload.php';

use App\Controllers\Controller;
use App\Controllers\Order;

//..ru/?c=controller&a=index
if (get('c')) {
    $controllerName = 'App\\Controllers\\' . ucfirst(get('c'));
    if (class_exists($controllerName)){
		$controller = new $controllerName();
	} else{
		$controller = new Controller();
	}
} else {
    $controller = new Controller();
}

$action = (get('a')) ? get('a') : 'index';
$controller->Request($action);