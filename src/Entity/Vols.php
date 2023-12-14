<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vols
 *
 * @ORM\Table(name="vols", indexes={@ORM\Index(name="nom_airways", columns={"nom_airways"})})
 * @ORM\Entity
 */
class Vols
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_vol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVol;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_airways", type="string", length=255, nullable=true)
     */
    private $nomAirways;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_billet", type="integer", nullable=false)
     */
    private $nbBillet;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_billet", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixBillet;

    /**
     * @var string
     *
     * @ORM\Column(name="date_depart", type="string", length=255, nullable=false)
     */
    private $dateDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255, nullable=false)
     */
    private $destination;

    public function getIdVol(): ?int
    {
        return $this->idVol;
    }

    public function getNomAirways(): ?string
    {
        return $this->nomAirways;
    }

    public function setNomAirways(?string $nomAirways): static
    {
        $this->nomAirways = $nomAirways;

        return $this;
    }

    public function getNbBillet(): ?int
    {
        return $this->nbBillet;
    }

    public function setNbBillet(int $nbBillet): static
    {
        $this->nbBillet = $nbBillet;

        return $this;
    }

    public function getPrixBillet(): ?float
    {
        return $this->prixBillet;
    }

    public function setPrixBillet(float $prixBillet): static
    {
        $this->prixBillet = $prixBillet;

        return $this;
    }

    public function getDateDepart(): ?string
    {
        return $this->dateDepart;
    }

    public function setDateDepart(string $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): static
    {
        $this->destination = $destination;

        return $this;
    }


}
