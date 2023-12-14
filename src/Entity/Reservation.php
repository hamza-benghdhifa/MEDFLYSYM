<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Reservation")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="DateRdv",type="datetime")
     * @Assert\NotBlank(message="Le champ DateRdv doit être renseigné")
     */
    private $DateRdv;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message="Le champ commentaire doit être renseigné")
     */
    private $commentaire;

/**
 * @ORM\ManyToOne(targetEntity="App\Entity\Medecinm", inversedBy="reser", cascade={"persist"})
 * @ORM\JoinColumn(name="medecinId",  nullable=false)
 */
private $medecinId; // Modifiez le nom de la propriété

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecinm", inversedBy="reser", cascade={"persist"})
     * @ORM\JoinColumn(name="PatientId",  nullable=false)
     */
    private $PatientId;




    public function getPatientId(): ?Medecinm
    {
        return $this->PatientId;
    }

    public function setPatientId(?Medecinm $patientId): self
    {
        $this->PatientId = $patientId;

        return $this;
    }



    public function getMedecinId(): ?Medecinm
    {
        return $this->medecinId;
    }
    
    public function setMedecinId(?Medecinm $medecinId): self
    {
        $this->medecinId = $medecinId;
    
        return $this;
    }
    














    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->DateRdv;
    }

    public function setDateRdv(\DateTimeInterface $DateRdv): self
    {
        $this->DateRdv = $DateRdv;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    






    public function getMedecin(): ?Medecin
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecin $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }











}
