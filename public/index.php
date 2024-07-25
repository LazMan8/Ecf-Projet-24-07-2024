<?php

require "../env.php";
require "../app/model/ConnexionDB.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$db = new ConnexionBD();



try {
    if (empty($_GET['page'])) {
        require "../app/app.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil":
                require "";
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
