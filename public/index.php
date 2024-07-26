<?php

require "../env.php";
require "../app/Models/ConnexionBD.php";
require "../vendor/autoload.php";
require "../app/Controllers/MotherController.php";
require "../app/Entities/MotherEntity.php";
// require du controller
require "../app/Controllers/PersonnelController.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// nouvelle instance du PDO
$db = new ConnexionBD();
// nouvelle instance de la classe MotherController pour executer le code
$pcontroller = new PersonnelController();


try {
    // si c'est vide alors sa affiche par defaut la page de login
    if (empty($_GET['page'])) {
        //require "../app/Views/login.php";
        $pcontroller->connexion();
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil":
                $pcontroller->connexion();
                break;

            case "login":
                $pcontroller->connexion();
                break;

            case "test":
                $pcontroller->afficherInfo();
                break;

            case "deconnexion":
                $pcontroller->deconnexion();
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
