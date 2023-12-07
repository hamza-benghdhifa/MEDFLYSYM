<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userhotel
 *
 * @ORM\Table(name="userhotel", uniqueConstraints={@ORM\UniqueConstraint(name="uc_userhotel", columns={"nom_hotel"})})
 * @ORM\Entity
 */
class Userhotel
{
    /**
     * @var int
     *
     * @ORM\Column(name="numpassport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numpassport;

    /**
     * @var string
     *
     * @ORM\Column(name="user_nom", type="string", length=255, nullable=false)
     */
    private $userNom;

    /**
     * @var string
     *
     * @ORM\Column(name="user_prenom", type="string", length=255, nullable=false)
     */
    private $userPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_hotel", type="string", length=255, nullable=true)
     */
    private $nomHotel;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var int
     *
     * @ORM\Column(name="chambre_reservee", type="integer", nullable=false)
     */
    private $chambreReservee;

    /**
     * @var float
     *
     * @ORM\Column(name="facture_hotel", type="float", precision=10, scale=0, nullable=false)
     */
    private $factureHotel;

    public function getNumpassport(): ?int
    {
        return $this->numpassport;
    }

    public function getUserNom(): ?string
    {
        return $this->userNom;
    }

    public function setUserNom(string $userNom): static
    {
        $this->userNom = $userNom;

        return $this;
    }

    public function getUserPrenom(): ?string
    {
        return $this->userPrenom;
    }

    public function setUserPrenom(string $userPrenom): static
    {
        $this->userPrenom = $userPrenom;

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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getChambreReservee(): ?int
    {
        return $this->chambreReservee;
    }

    public function setChambreReservee(int $chambreReservee): static
    {
        $this->chambreReservee = $chambreReservee;

        return $this;
    }

    public function getFactureHotel(): ?float
    {
        return $this->factureHotel;
    }

    public function setFactureHotel(float $factureHotel): static
    {
        $this->factureHotel = $factureHotel;

        return $this;
    }


}
