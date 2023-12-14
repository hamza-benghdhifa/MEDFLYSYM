<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uservol
 *
 * @ORM\Table(name="uservol", indexes={@ORM\Index(name="idx_nom_compagnie", columns={"nom_compagnie"})})
 * @ORM\Entity
 */
class Uservol
{
    /**
     * @var int
     *
     * @ORM\Column(name="num_passport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numPassport;

    /**
     * @var string
     *
     * @ORM\Column(name="usernom", type="string", length=255, nullable=false)
     */
    private $usernom;

    /**
     * @var string
     *
     * @ORM\Column(name="userprenom", type="string", length=255, nullable=false)
     */
    private $userprenom;

    /**
     * @var int
     *
     * @ORM\Column(name="billet_reservee", type="integer", nullable=false)
     */
    private $billetReservee;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=255, nullable=false)
     */
    private $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="date_depart", type="string", length=255, nullable=false)
     */
    private $dateDepart;

    /**
     * @var float
     *
     * @ORM\Column(name="facture_vol", type="float", precision=10, scale=0, nullable=false)
     */
    private $factureVol;

    /**
     * @var \Vols
     *
     * @ORM\ManyToOne(targetEntity="Vols")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nom_compagnie", referencedColumnName="nom_airways")
     * })
     */
    private $nomCompagnie;

    public function getNumPassport(): ?int
    {
        return $this->numPassport;
    }

    public function getUsernom(): ?string
    {
        return $this->usernom;
    }

    public function setUsernom(string $usernom): static
    {
        $this->usernom = $usernom;

        return $this;
    }

    public function getUserprenom(): ?string
    {
        return $this->userprenom;
    }

    public function setUserprenom(string $userprenom): static
    {
        $this->userprenom = $userprenom;

        return $this;
    }

    public function getBilletReservee(): ?int
    {
        return $this->billetReservee;
    }

    public function setBilletReservee(int $billetReservee): static
    {
        $this->billetReservee = $billetReservee;

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

    public function getDateDepart(): ?string
    {
        return $this->dateDepart;
    }

    public function setDateDepart(string $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getFactureVol(): ?float
    {
        return $this->factureVol;
    }

    public function setFactureVol(float $factureVol): static
    {
        $this->factureVol = $factureVol;

        return $this;
    }

    public function getNomCompagnie(): ?Vols
    {
        return $this->nomCompagnie;
    }

    public function setNomCompagnie(?Vols $nomCompagnie): static
    {
        $this->nomCompagnie = $nomCompagnie;

        return $this;
    }


}
