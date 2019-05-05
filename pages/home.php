<h1>Je suis la homepage</h1>

<p><a href="index.php?page=single">Single</a></p>

<?php


$queryStr = "SELECT * FROM articles";
// $prep = $db->prepare($queryStr);
// var_dump($prep);
$res = $db->db_query($queryStr, "App\Table\Article");
// $count = $pdo->exec("INSERT INTO articles SET titre='Mon titre', date='" . date('Y-m-d H:i:s') . "'");
// var_dump($count);
?>
<ul>
	<?php foreach ($res as $post): ?>
		<h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
		<p><?= $post->extrait ?></p>
	<?php endforeach ?>
</ul>
