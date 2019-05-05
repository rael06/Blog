<?php
use App\Autoloader;
use App\Database;
require_once "../app/Autoloader.php";
Autoloader::register();

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "home";
}

// Initialisation des objets
$db = new Database("localhost", "blog", "root", "");


ob_start();
if ($page === "home") {
    require "../pages/home.php";
} elseif ($page === "single") {
    require "../pages/single.php";
}
$content = ob_get_clean();
require "../pages/templates/default.php";
?>
