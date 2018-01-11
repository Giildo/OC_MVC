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
            <a href=<?= '"/OC_MVC/post/' . $data['id'] . '"'; ?>>
                <h3><?= htmlspecialchars($data['title']) ?></h3>
                <h4>le <?= $data['creation_date_fr'] ?></h4>
                
                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                </p>
            </a>
        </div>
    <?php
    }

    $posts->closeCursor();
?>
</div>

<?php
$content = ob_get_clean();

require('template.php');