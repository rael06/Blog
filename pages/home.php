<h1>Je suis la homepage</h1>

<p><a href="index.php?page=single">Single</a></p>

<?php

use App\Table\Article;
use App\Table\Categorie;

// $prep = $db->prepare($queryStr);
// var_dump($prep);
// $count = $pdo->exec("INSERT INTO articles SET titre='Mon titre', date='" . date('Y-m-d H:i:s') . "'");
// var_dump($count);
?>
<div class="row">
	<div class="col-sm-8">
		<ul>
			<?php foreach (Article::getLast() as $post): ?>
				<h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
				<p><em><?= $post->categorie ?></em></p>
				<p><?= $post->extrait ?></p>
			<?php endforeach ?>
		</ul>
	</div>

	<div class="col-sm-4">
		<?php foreach (Categorie::all() as $categorie) : ?>
			<li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a></li>
		<?php endforeach ?>
	</div>
</div>
