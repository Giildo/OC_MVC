<?php

use \Jojotique\OC_MVC\controler\Controler;
use \Jojotique\OC_MVC\lib\framework\Router;

require_once('controler/Controler.php');
require_once('lib/framework/Router.php');

try {
	$router = new Router($_SERVER[REQUEST_URI]);
	$router = $router->uriChecker();

	$controler = new Controler();

	if ($router) {
		$methode = $router->route()->action();
		$controler->$methode($router->var());
	} else {
		$controler->listPosts();
	}
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}