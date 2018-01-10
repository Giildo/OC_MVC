<?php

use \Jojotique\OC_MVC\controler\Controler;
use \Jojotique\OC_MVC\lib\framework\Router;

require_once('controler/Controler.php');
require_once('lib/framework/Router.php');

try { // On essaie de faire des choses
	$controler = new Controler();
	$router = new router($_SERVER[REQUEST_URI]);
	$route = $router->uriChecker();

	var_dump($route);

	if ($route) {
		$methode = $route->action();
		$controler->$methode(2);
	} else {
		$controler->listPosts();
	}
/*
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			$controler->listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$controler->post();
			}
			elseif (isset($_GET['id']) && $_GET['id'] <= 0) {
				throw new \Exception('Identifiant du post non valide');
			} else {
				// Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new \Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					$controler->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
					// Autre exception
					throw new \Exception('Tous les champs ne sont pas remplis !');
				}
			}
			else {
				// Autre exception
				throw new \Exception('Aucun identifiant de billet envoyé');
			}
		}
	}*/
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}