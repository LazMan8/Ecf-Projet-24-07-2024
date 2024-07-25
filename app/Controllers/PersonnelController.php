<?php

class PersonnelController
{
    public function connexion()
    {
        //Variable titre et paragraphe
        $titreH1 = "Connexion";
        $paragraphe = "Formulaire de connexion";

        //Afichage du formaulaire
        require("app/Views/login.php");

        if (count($_POST) > 0) {
        }



        // fais une condition si tous les champs du fmormulaire de login sont completer en POST alors 


    }

    public function deconnexion()
    {
        // On lance la session pour pouvoir la détruire
        session_start();
        session_destroy();

        // on lance la session pour le message puis redirection vers la page d'accueil
        session_start();
        $_SESSION['message'] = "Vous êtes bien déconnecté";
        header("Location:index.php");
    }
}
