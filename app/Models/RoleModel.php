<?php

class RoleModel extends ConnexionBD{

    public function __construct(){
        parent::__construct();
    }


    // Suppression des roles
    public function deleteRole($idRoleAppli, $idAppli){
        
        
        $strQuery = 'DELETE FROM esthabilite WHERE idRoleAppli=? && idAppli = ?';
        $stmt = $this-> _dataBase->prepare($strQuery);
        $stmt->execute([$idRoleAppli, $idAppli]);

        $strQuery = 'DELETE FROM roleApplicatif WHERE idRoleAppli=? && idAppli = ?';
        $stmt = $this-> _dataBase->prepare($strQuery);
        $stmt->execute([$idRoleAppli, $idAppli]);

        return $stmt->rowCount();



    }

    public function ListRole() {
        $strQuery = "SELECT `application`.idAppli, nomAppli,bdAppli,roleapplicatif.idRoleAppli,mdpRoleAppli 
                       FROM roleApplicatif 
                        INNER JOIN `application` ON `application`.idAppli = roleapplicatif.idAppli ";
                        
        $dbRoles = $this-> _dataBase->query($strQuery)->fetchAll();
        foreach($dbRoles as $dbRole) {
            $roles[] = new RoleEntity($dbRole['idAppli'], $dbRole['idRoleAppli'], $dbRole['mdpRoleAppli'], 
                         $dbRole['nomAppli'], $dbRole['bdAppli']);
        } 
        
        // Exécution de la requête et affichage des résultats
        return $roles;
    }
    
    // fonction qui ajoute un role
    public function addRole($idAppli, $mdpRoleAppli)
    {
        $strQuery = "INSERT INTO roleapplicatif (idAppli, mdpRoleAppli) VALUES (?, ?)";
        $stmt = $this-> _dataBase->prepare($strQuery);
        $stmt->execute([$idAppli, $mdpRoleAppli]);
        return $stmt->rowCount();
       
 
    }












}