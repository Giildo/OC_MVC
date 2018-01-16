<?php

$title = "Modification de commentaire";

$comment = $comment->fetch();

ob_start(); ?>

<section>
	<form action="/OC_MVC/modifyComment/<?= $comment['id']; ?>" method="post">
		<fieldset>
			<legend>Modifier le commentaire</legend>
			<div class="form-group">
				<label for="comment">Commentaire</label>
				<textarea id="comment" name="comment" class="form-control"><?= $comment['comment']; ?></textarea>
			</div>
			<div>
				<input type="submit" class="btn" />
			</div>
		</fieldset>
	</form>
</section>

<?php
$content = ob_get_clean();

require('template.php');