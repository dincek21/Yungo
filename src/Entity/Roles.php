<?php

namespace App\Entity;

use App\Repository\RolesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RolesRepository::class)
 */
class Roles
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $rols;

    /**
     * @ORM\OneToOne(targetEntity=Usuario::class, mappedBy="fkRoles", cascade={"persist", "remove"})
     */
    private $userfk;

    public function getIdRol(): ?string
    {
        return $this->id;
    }

    public function setIdRol(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getrols(): ?string
    {
        return $this->rols;
    }

    public function setrols(string $rols): self
    {
        $this->rols = $rols;

        return $this;
    }

    public function getUserfk(): ?Usuario
    {
        return $this->userfk;
    }

    public function setUserfk(Usuario $userfk): self
    {
        // set the owning side of the relation if necessary
        if ($userfk->getFkRoles() !== $this) {
            $userfk->setFkRoles($this);
        }

        $this->userfk = $userfk;

        return $this;
    }
}
