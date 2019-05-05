<?php
$queryStr = "SELECT * FROM articles WHERE id = ?";
$id = [$_GET["id"]];
$class = "App\Table\Article";
$post = $db->db_prepare($queryStr, $id, $class, true);
var_dump($post);
?>

<h1><?= $post->titre ?></h1>
<p><?= $post->contenu ?></p>
<p><a href="index.php?page=home">Home</a></p>