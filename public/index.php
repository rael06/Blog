<?php

error_reporting(E_ALL);

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
} elseif ($page === "categorie") {
    require "../pages/categorie.php";
}
$content = ob_get_clean();
require "../pages/templates/default.php";

/*
<?php
error_reporting(E_ALL);

use App\Autoloader;
require_once "../app/Autoloader.php";
Autoloader::register();

$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

$routes = [
    "" => "../pages/home.php",
    "home" => "../pages/home.php",
    "page" => "../pages/page.php",
    "categorie" => "../pages/categorie.php"
];

function autoRequire($routes, $page) {
    if(isset($routes[$page])) {
        require "../pages/".$routes[$page];
        return;
    }
    print "404";
}

ob_start();
autoRequire($routes, $page);
$content = ob_get_clean();
require "../pages/templates/default.php";
?>
*/
?>
