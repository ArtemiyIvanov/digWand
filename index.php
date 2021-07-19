<?php

require './vendor/autoload.php';

use App\Controllers\Controller;

$action = (get('a')) ? get('a') : 'index';
//..ru/?c=controller&a=index
if (get('c')) {
    $controllerName = ucfirst(get('c'));
    if (class_exists($controllerName)){
		$controller = new $controllerName();
	} else{
		$controller = new Controller();
	}
} else {
    $controller = new Controller();
}

$controller->Request($action);