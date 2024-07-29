<?php

class RoleModel extends ConnexionBD{

    public function __construct(){
        parent::__construct();
    }


    // Suppression des roles
    public function deleteRole($idRoleAppli, $idAppli){
        
        
        $strquery = 'DELETE FROM esthabilite WHERE idRoleAppli=? && idAppli = ?';
        $stmt = $this-> _dataBase->prepare($strquery);
        $stmt->execute([$idRoleAppli, $idAppli]);

        $strquery = 'DELETE FROM roleApplicatif WHERE idRoleAppli=? && idAppli = ?';
        $stmt = $this-> _dataBase->prepare($strquery);
        $stmt->execute([$idRoleAppli, $idAppli]);

        return $stmt->rowCount();



    }

    // fonction qui affiche tous les roles
    public function ListRole() {
        $strQuery = "SELECT `application`.idAppli, nomAppli,bdAppli,roleapplicatif.idRoleAppli,mdpRoleAppli 
                       FROM roleapplicatif 
                        INNER JOIN `application` ON `application`.idAppli = roleapplicatif.idAppli ";
                        
        $dbRoles = $this-> _dataBase->query($strQuery)->fetchAll();
        foreach($dbRoles as $dbRole) {
            $roles[] = new RoleEntity($dbRole['idAppli'], $dbRole['idRoleAppli'], $dbRole['mdpRoleAppli'], 
                         $dbRole['nomAppli'], $dbRole['bdAppli']);

        } 
        

        // Exécution de la requête et affichage des résultats
        return $roles;
    }












}