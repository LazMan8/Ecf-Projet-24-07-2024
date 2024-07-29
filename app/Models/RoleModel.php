<?php



class RoleModel extends ConnexionBD
{
    public function ListRole(): array
    {
        $role = new RoleEntity("2", "atelier_superviseur", "zzzzzz", "gestion des ateliers", "bdAtelier");

        $roles[] = $role;

        $role = new RoleEntity("1", "animaux_superviseur", "xyz", "gestion des animaux", "bdAnimaux");

        $roles[] = $role;


        $role = new RoleEntity("3", "animaux_stagiere", "0000", "gestion des animaux", "bdAnimaux");

        $roles[] = $role;

        
        
        
        return $roles;
        

    }
}