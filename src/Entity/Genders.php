<?php

namespace App\Entity;

use App\Repository\GendersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GendersRepository::class)
 */
class Genders
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20)
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $genders;

    /**
     * @ORM\OneToOne(targetEntity=Usuario::class, mappedBy="fkGender", cascade={"persist", "remove"})
     */
    private $userfk;

    public function getIdGender(): ?string
    {
        return $this->id;
    }

    public function setIdGender(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getGenders(): ?string
    {
        return $this->genders;
    }

    public function setGenders(string $genders): self
    {
        $this->genders = $genders;

        return $this;
    }

    public function getUserfk(): ?Usuario
    {
        return $this->userfk;
    }

    public function setUserfk(Usuario $userfk): self
    {
        // set the owning side of the relation if necessary
        if ($userfk->getFkGender() !== $this) {
            $userfk->setFkGender($this);
        }

        $this->userfk = $userfk;

        return $this;
    }
}
