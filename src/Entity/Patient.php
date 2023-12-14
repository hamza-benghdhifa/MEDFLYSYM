<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateNai", type="date", nullable=false)
     */
    private $datenai;

    /**
     * @var int
     *
     * @ORM\Column(name="NumAssu", type="integer", nullable=false)
     */
    private $numassu;

    /**
     * @var string
     *
     * @ORM\Column(name="Maladie", type="string", length=255, nullable=false)
     */
    private $maladie;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailP", type="string", length=255, nullable=false)
     */
    private $emailp;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255, nullable=false)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenai(): ?\DateTimeInterface
    {
        return $this->datenai;
    }

    public function setDatenai(\DateTimeInterface $datenai): static
    {
        $this->datenai = $datenai;

        return $this;
    }

    public function getNumassu(): ?int
    {
        return $this->numassu;
    }

    public function setNumassu(int $numassu): static
    {
        $this->numassu = $numassu;

        return $this;
    }

    public function getMaladie(): ?string
    {
        return $this->maladie;
    }

    public function setMaladie(string $maladie): static
    {
        $this->maladie = $maladie;

        return $this;
    }

    public function getEmailp(): ?string
    {
        return $this->emailp;
    }

    public function setEmailp(string $emailp): static
    {
        $this->emailp = $emailp;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }


}
