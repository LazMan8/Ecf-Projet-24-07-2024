<?php

class ConnexionBD
{
    protected PDO $_dataBase;
    
    public function  __construct()
    {
        try 
        {
            
        } 
        catch (PDOException $e) 
        {
            echo "echec de la connexion : " . $e->getMessage();
        }
    }
}