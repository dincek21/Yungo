<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname_user;

    /**
     * @ORM\Column(type="integer")
     */
    private $age_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pass_user;

    /**
     * @ORM\OneToOne(targetEntity=Genders::class, inversedBy="userfk", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkGender;

    /**
     * @ORM\OneToOne(targetEntity=Roles::class, inversedBy="userfk", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkRoles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameUser(): ?string
    {
        return $this->name_user;
    }

    public function setNameUser(string $name_user): self
    {
        $this->name_user = $name_user;

        return $this;
    }

    public function getLastnameUser(): ?string
    {
        return $this->lastname_user;
    }

    public function setLastnameUser(string $lastname_user): self
    {
        $this->lastname_user = $lastname_user;

        return $this;
    }

    public function getAgeUser(): ?int
    {
        return $this->age_user;
    }

    public function setAgeUser(int $age_user): self
    {
        $this->age_user = $age_user;

        return $this;
    }

    public function getPictureUser()
    {
        return $this->picture_user;
    }

    public function setPictureUser($picture_user)
    {
        $this->picture_user = $picture_user;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user): self
    {
        $this->email_user = $email_user;

        return $this;
    }

    public function getPassUser(): ?string
    {
        return $this->pass_user;
    }

    public function setPassUser(string $pass_user): self
    {
        $this->pass_user = $pass_user;

        return $this;
    }

    public function getFkGender(): ?Genders
    {
        return $this->fkGender;
    }

    public function setFkGender(Genders $fkGender): self
    {
        $this->fkGender = $fkGender;

        return $this;
    }

    public function getFkRoles(): ?Roles
    {
        return $this->fkRoles;
    }

    public function setFkRoles(Roles $fkRoles): self
    {
        $this->fkRoles = $fkRoles;

        return $this;
    }
}
