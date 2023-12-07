<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avisetcommentaires
 *
 * @ORM\Table(name="avisetcommentaires")
 * @ORM\Entity
 */
class Avisetcommentaires
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Avis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAvis;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Service", type="string", length=255, nullable=false)
     */
    private $nomService;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Patient", type="integer", nullable=false)
     */
    private $idPatient;

    /**
     * @var int
     *
     * @ORM\Column(name="Note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="Commentaire", type="string", length=255, nullable=false)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="Date_Avis", type="string", length=255, nullable=false)
     */
    private $dateAvis;

    public function getIdAvis(): ?int
    {
        return $this->idAvis;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): static
    {
        $this->nomService = $nomService;

        return $this;
    }

    public function getIdPatient(): ?int
    {
        return $this->idPatient;
    }

    public function setIdPatient(int $idPatient): static
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getDateAvis(): ?string
    {
        return $this->dateAvis;
    }

    public function setDateAvis(string $dateAvis): static
    {
        $this->dateAvis = $dateAvis;

        return $this;
    }


}
