<?php

$title = $post['title']; ?>

<?php ob_start(); ?>
<h1>Mon super blog</h1>

<section>
    <p>
        <a href="/OC_MVC/" class="a_retour">< Retour à la liste des billets</a>
    </p>

    <div class="news">
        <h3><?= htmlspecialchars($post['title']) ?></h3>
        <h4><?= $post['creation_date_fr'] ?></h4>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <div id="coms">
        <?php if ($comment = $comments->fetch()) : ?>
            <h2>Commentaires</h2>
        <?php
            do
            {
                ?>
                <div class="comment">
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                    <p class="com"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                </div>
            <?php
            } while ($comment = $comments->fetch());
        endif;?>
    </div>    

    <form action="/OC_MVC/addComment/<?= $id ?>" method="post">
        <fieldset>
            <legend>Ajouter un commentaire</legend>
            <div class="form-group">
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" class="form-control" />
            </div>
            <div class="form-group">
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" class="form-control"></textarea>
            </div>
            <div>
                <input type="submit" class="btn" />
            </div>
        </fieldset>
    </form>

    <p>
        <a href="/OC_MVC/" class="a_retour">< Retour à la liste des billets</a>
    </p>
</section>

<?php
$comments->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>