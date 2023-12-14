<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;

/**
 * Patientm
 *
 * @ORM\Table(name="patientm")
 * @ORM\Entity
 */
class Patientm
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
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="PatientId")
     */
    private $reservasions;

    public function __construct()
    {
        $this->reservasions = new ArrayCollection();
    }

    /**
     * @return Collection|Reservasion[]
     */
    public function getReservasions(): Collection
    {
        return $this->reservasions;
    }

    public function addReservasion(Reservasion $reservasion): self
    {
        if (!$this->reservasions->contains($reservasion)) {
            $this->reservasions[] = $reservasion;
            $reservasion->setPatientId($this);
        }

        return $this;
    }

    public function removeReservasion(Reservasion $reservasion): self
    {
        if ($this->reservasions->contains($reservasion)) {
            $this->reservasions->removeElement($reservasion);
            // set the owning side to null (unless already changed)
            if ($reservasion->getPatientId() === $this) {
                $reservasion->setPatientId(null);
            }
        }

        return $this;
    }






 


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

 




}

