<h1>Je suis la homepage</h1>

<p><a href="index.php?page=single">Single</a></p>

<?php
use App\Autoloader;
use App\Database;

require_once "../app/Autoloader.php";
Autoloader::register();


$db = new Database("localhost", "blog", "root", "");
$queryStr = "SELECT * FROM articles";
$res = $db->query($queryStr);
// $count = $pdo->exec("INSERT INTO articles SET titre='Mon titre', date='" . date('Y-m-d H:i:s') . "'");
var_dump($res);
// var_dump($count);

?>