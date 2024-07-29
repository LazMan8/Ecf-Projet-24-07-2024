<?php

// require "../Models/RoleModel.php";

class RoleController extends MotherController
{
    // gestion des roles
    public function gestionRoles()
    {
        //Initialise un tableau d'erreur
        $arrErrors	= array();

        
    }

    //affectation d'un role au personnel
    public function affectationRoles()
    {
        //Initialise un tableau d'erreur
        $arrErrors	= array();

        //require 
        require __DIR__ . "/../Models/RoleModel.php";
        $roleModel = new RoleModel();


        if (isset($_GET['action']) && $_GET['action'] == 'supprimer')
        {
            
            $idRoleAppli = $_GET['idRoleAppli'] ?? '';
            $idAppli = $_GET['idAppli'] ?? -1;

            $roleModel->deleteRole($idRoleAppli, $idAppli);
            
            header('Location: index.php?page=gestionRole');
        }

        // if (isset($_GET['action']) && $_GET['action'] == 'modifize')
        // {
        //     # code...
        //     $idRoleAppli = $_GET['idRoleAppli'] ?? '';
        //     $idAppli = $_GET['idAppli'] ?? -1;

        //     //$roleModel->deleteRole($idRoleAppli, $idAppli);
            
        //     header('Location: index.php?page=gestionRole');
        // }


        $roles = $roleModel->ListRole();


        // requier pour tester
        require __DIR__ . "/../Views/affectationRole.php";
    }


    // ajout d'un role
    public function addRole()
    {
        //Initialise un tableau d'erreur
        $arrErrors	= array();
        
        //require de model pour faire appel a la methode 
        require __DIR__ . "/../Models/RoleModel.php";
        $roleModel = new RoleModel();

        // appelle d'un formulaire d'ajout de role
        require "../views/addPerso.php";

        if (isset($_GET['action']) && $_GET['action'] == 'ajouter')
        {
            
            $idRoleAppli = $_GET['idRoleAppli'] ?? '';
            $idAppli = $_GET['idAppli'] ?? -1;

            $roleModel->addRole($idRoleAppli, $idAppli);
            
            header('Location: index.php?page=gestionRole');
        }


        $roles = $roleModel->ListRole();
    }

}