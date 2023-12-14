<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GestionCategories
 *
 * @ORM\Table(name="gestion_categories")
 * @ORM\Entity
 */
class GestionCategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NomCategorie", type="string", length=255, nullable=false)
     */
    private $nomcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="Tarification", type="integer", nullable=false)
     */
    private $tarification;

    /**
     * @var string
     *
     * @ORM\Column(name="Ref_Services", type="string", length=255, nullable=false)
     */
    private $refServices;

    /**
     * @var string
     *
     * @ORM\Column(name="Disponibilite", type="string", length=255, nullable=false)
     */
    private $disponibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="Date", type="string", length=255, nullable=false)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcategorie(): ?string
    {
        return $this->nomcategorie;
    }

    public function setNomcategorie(string $nomcategorie): static
    {
        $this->nomcategorie = $nomcategorie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTarification(): ?int
    {
        return $this->tarification;
    }

    public function setTarification(int $tarification): static
    {
        $this->tarification = $tarification;

        return $this;
    }

    public function getRefServices(): ?string
    {
        return $this->refServices;
    }

    public function setRefServices(string $refServices): static
    {
        $this->refServices = $refServices;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }


}
