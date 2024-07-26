<?php
class ApplicationEntity{
    private string $idAppli;
    private string $idRoleAppli;
    private string $bdAppli;



    public function __construct(string $idAppli, string $idRoleAppli, string $bdAppli){
        $this->idAppli = $idAppli;
        $this->idRoleAppli = $idRoleAppli;
        $this->bdAppli = $bdAppli;

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
     * Get the value of bdAppli
     */
    public function getbdAppli(): string
    {
        return $this->bdAppli;
    }

    /**
     * Set the value of bdAppli
     */
    public function setbdAppli(string $bdAppli): self
    {
        $this->bdAppli = $bdAppli;

        return $this;
    }
}