<?php
class RoleEntity{
    private string $idAppli;
    private string $idRoleAppli;
    private string $mdpRoleAppli;



    public function __construct(string $idAppli, string $idRoleAppli, string $mdpRoleAppli){
        $this->idAppli = $idAppli;
        $this->idRoleAppli = $idRoleAppli;
        $this->mdpRoleAppli = $mdpRoleAppli;

    }
    

    /**
     * Get the value of idAppli
     */
    public function getIdAppli(): string
    {
        return $this->idAppli;
    }

    /**
     * Set the value of idAppli
     */
    public function setIdAppli(string $idAppli): self
    {
        $this->idAppli = $idAppli;

        return $this;
    }

    /**
     * Get the value of idRoleAppli
     */
    public function getIdRoleAppli(): string
    {
        return $this->idRoleAppli;
    }

    /**
     * Set the value of idRoleAppli
     */
    public function setIdRoleAppli(string $idRoleAppli): self
    {
        $this->idRoleAppli = $idRoleAppli;

        return $this;
    }

    /**
     * Get the value of mdpRoleAppli
     */
    public function getMdpRoleAppli(): string
    {
        return $this->mdpRoleAppli;
    }

    /**
     * Set the value of mdpRoleAppli
     */
    public function setMdpRoleAppli(string $mdpRoleAppli): self
    {
        $this->mdpRoleAppli = $mdpRoleAppli;

        return $this;
    }
}