<?php
use App\Autoloader;
require_once "../app/Autoloader.php";
Autoloader::register();

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "home";
}


ob_start();
if ($page === "home") {
    require "../pages/home.php";
} elseif ($page === "article") {
    require "../pages/single.php";
}
$content = ob_get_clean();
require "../pages/templates/default.php";
?>
