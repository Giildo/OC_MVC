<?php

namespace Jojotique\OC_MVC\model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments(string $postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment(int $postId, string $author, string $comment, int $hidden)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function getComment(int $commentId) {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date_fr FROM comments WHERE id = ? ');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function modifyComment (int $commentId, string $newComment) {
        $db = $this->dbconnect();
        $comment = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $comment->execute(array($newComment, $commentId));

        return $post_id;
    }
}