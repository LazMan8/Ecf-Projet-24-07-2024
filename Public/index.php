<?php

require "../env.php";
require "../app/Models/ConnexionBD.php";
require "../app/Controllers/MotherController.php";
require "../app/Entities/MotherEntity.php";
require "../app/Models/PersonnelModel.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$db = new ConnexionBD();

$m = new PersonnelModel();
$p = $m->findPersonnelByEmail("adrienschmitt@expemple.com");
echo "<pre>";
var_dump($p);
echo "</pre>";


try {
    if (empty($_GET['page'])) {
        require "../app/Views/Partial/header.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil":
                echo "coucou";
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
