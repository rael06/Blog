<?php
use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET["id"]);

if ( $categorie === false) {
	header("HTTP/1.0 404 NOT FOUND");
	header("Location:index.php?page=404");
}
$articles = Article::lastByCategory($_GET["id"]);
$categories = Categorie::all();
?>

<h1><?= $categorie->titre ?></h1>
<div class="row">
	<div class="col-sm-8">
		<ul>
			<?php foreach ($articles as $post): ?>
				<h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
				<p><em><?= $post->categorie ?></em></p>
				<p><?= $post->extrait ?></p>
			<?php endforeach ?>
		</ul>
	</div>

	<div class="col-sm-4">
		<?php foreach ($categories as $categorie) : ?>
			<li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a></li>
		<?php endforeach ?>
	</div>
</div>