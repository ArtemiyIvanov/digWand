<?php
require './vendor/autoload.php';

use App\Controllers\HomeController, App\Controllers\OrderController;

//..ru/?c=controller&a=index
if (get('c')) {
    $controllerName = 'App\\Controllers\\' . ucfirst(get('c')) . 'Controller';
    if (class_exists($controllerName)){
		$controller = new $controllerName();
	} else{
		$controller = new HomeController();
	}
} else {
    $controller = new HomeController();
}

$action = (get('a')) ? get('a') : 'index';
$controller->Request($action);