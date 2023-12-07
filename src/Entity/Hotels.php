<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotels
 *
 * @ORM\Table(name="hotels", indexes={@ORM\Index(name="FK_nom_hotel", columns={"nom_hotel"})})
 * @ORM\Entity
 */
class Hotels
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_hotel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHotel;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_etoile", type="string", length=255, nullable=false)
     */
    private $nbEtoile;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_chambre", type="integer", nullable=false)
     */
    private $nbChambre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_nuit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixNuit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_hotel", type="string", length=255, nullable=true)
     */
    private $nomHotel;

    public function getIdHotel(): ?int
    {
        return $this->idHotel;
    }

    public function getNbEtoile(): ?string
    {
        return $this->nbEtoile;
    }

    public function setNbEtoile(string $nbEtoile): static
    {
        $this->nbEtoile = $nbEtoile;

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

    public function getNbChambre(): ?int
    {
        return $this->nbChambre;
    }

    public function setNbChambre(int $nbChambre): static
    {
        $this->nbChambre = $nbChambre;

        return $this;
    }

    public function getPrixNuit(): ?float
    {
        return $this->prixNuit;
    }

    public function setPrixNuit(float $prixNuit): static
    {
        $this->prixNuit = $prixNuit;

        return $this;
    }

    public function getNomHotel(): ?string
    {
        return $this->nomHotel;
    }

    public function setNomHotel(?string $nomHotel): static
    {
        $this->nomHotel = $nomHotel;

        return $this;
    }


}
