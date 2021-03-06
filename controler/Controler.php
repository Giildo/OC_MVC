<?php

namespace Jojotique\OC_MVC\controler;

// Chargement des classes
use \Jojotique\OC_MVC\model\PostManager;
use \Jojotique\OC_MVC\model\CommentManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class Controler
{
	function listPosts() {
		$postManager = new PostManager(); // Création d'un objet
		$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

		require('view/frontend/listPostsView.php');
	}

	function post(int $id) {
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post = $postManager->getPost($id);
		$comments = $commentManager->getComments($id);

		require('view/frontend/postView.php');
	}

	function addComment(int $postId, string $author, string $comment) {
		$commentManager = new CommentManager();

		$affectedLines = $commentManager->postComment($postId, $author, $comment);

		if ($affectedLines === false) {
			throw new Exception('Impossible d\'ajouter le commentaire !');
		}
		else {
			header('Location: /OC_MVC/post/' . $postId);
		}
	}

	function modifyComment(int $commentId, string $author = null, string $comment = null) {
		$commentManager = new CommentManager();

		if ($comment == null) {
			$comment = $commentManager->getComment($commentId);

			require('view/frontend/modifyComment.php');
		} else {
			$commentManager->modifyComment($commentId, $comment);
			$comment = $commentManager->getComment($commentId);
			$comment = $comment->fetch();

			header('Location: /OC_MVC/post/' . $comment['post_id']);
		}
	}
}