<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Medecin
 *
 * @ORM\Table(name="medecin")
 * @ORM\Entity
 */
class Medecin
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
     * @var string
     *
     * @ORM\Column(name="Specialite", type="string", length=255, nullable=false)
     */
    private $specialite;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateGrad", type="date", nullable=false)
     */
    private $dategrad;

    /**
     * @var int
     *
     * @ORM\Column(name="NumberGrad", type="integer", nullable=false)
     */
    private $numbergrad;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="MotDePasse", type="string", length=255, nullable=false)
     */
    private $motdepasse;

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

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDategrad(): ?\DateTimeInterface
    {
        return $this->dategrad;
    }

    public function setDategrad(\DateTimeInterface $dategrad): static
    {
        $this->dategrad = $dategrad;

        return $this;
    }

    public function getNumbergrad(): ?int
    {
        return $this->numbergrad;
    }

    public function setNumbergrad(int $numbergrad): static
    {
        $this->numbergrad = $numbergrad;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): static
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }


}
