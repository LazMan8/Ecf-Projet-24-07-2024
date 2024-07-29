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
            # code...
            $idRoleAppli = $_GET['idRoleAppli'] ?? '';
            $idAppli = $_GET['idAppli'] ?? -1;

            //$roleModel->deleteRole($idRoleAppli, $idAppli);
            
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

        

        // verifie si les 
        // if () 
        // {

        // }

        // requier pour tester
        require __DIR__ . "/../Views/affectationRole.php";
    }
}