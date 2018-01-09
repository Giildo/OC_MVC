<?php

use \Jojotique\OC_MVC\controler\Controler;

require_once('controler/Controler.php');

try { // On essaie de faire des choses
	$controler = new Controler();

	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPosts') {
			$controler->listPosts();
		}
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$controler->post();
			}
			else {
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
	}
	else {
		$controler->listPosts();
	}
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}