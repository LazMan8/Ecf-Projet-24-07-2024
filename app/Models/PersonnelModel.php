<?php

require __DIR__ . "/../Entities/PersonnelEntity.php";

class PersonnelModel extends ConnexionBD {

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function findPersonnelByMel() : ?PersonnelEntity
    {
        //
        $personnelEntity = new PersonnelEntity("Ak17", "po@po.po","$2y$10$6fvqo..0jGpmE.Hb2QdsAeqRa1zuxCWMd/Hy9AnUo5W15sXrY/otG",
        "Laza","and","23/07/2000", "Strasbourg", "Rue", "67000", "78897", "");

        //Requête preparer pour trouver le personnel

        //execute la commmande


        return $personnelEntity;
    }
}
