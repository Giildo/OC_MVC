<?php

$title = 'The best Blog';

ob_start();?>
<h1>Mon super blog</h1>

<div id="corps">
    <h2>Derniers billets du blog :</h2>


    <?php
    while ($data = $posts->fetch())
    {
    ?>
        <div class="news">
            <h3><?= htmlspecialchars($data['title']) ?></h3>
            <h4>le <?= $data['creation_date_fr'] ?></h4>
            
            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <br />
                <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
    <?php
    }

    $posts->closeCursor();
?>
</div>

<?php
$content = ob_get_clean();

require('template.php');