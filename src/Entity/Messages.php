<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Messages
 *
 * @ORM\Entity(repositoryClass=MessagesRepository::class)
 */
class Messages
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="Id", type="integer")
     */
    private ?int $id = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ObjetMessage", type="string", length=255)
     */
    private ?string $ObjetMessage = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ContenuMessage", type="string", length=255)
     */
    private ?string $ContenuMessage = null;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="DateEnvoi", type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private ?\DateTimeInterface $DateEnvoi = null;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailDestinataire", type="string", length=255)
     * @Assert\NotBlank(message="Votre email ne peut pas être vide")
     * @Assert\Email(message="Votre email '{{ value }}' n'est pas une adresse email valide.")
     */
    private ?string $EmailDestinataire = null;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     * @Assert\NotBlank(message="Votre email ne peut pas être vide")
     * @Assert\Email(message="Votre email '{{ value }}' n'est pas une adresse email valide.")
     */
    private ?string $Email = null;

    public function __construct()
    {
        // Set the current date and time when the entity is created
        $this->DateEnvoi = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjetMessage(): ?string
    {
        return $this->ObjetMessage;
    }

    public function setObjetMessage(string $ObjetMessage): static
    {
        $this->ObjetMessage = $ObjetMessage;

        return $this;
    }

    public function getContenuMessage(): ?string
    {
        return $this->ContenuMessage;
    }

    public function setContenuMessage(string $ContenuMessage): static
    {
        $this->ContenuMessage = $ContenuMessage;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->DateEnvoi;
    }

    // Remove the setter for DateEnvoi to make it read-only
    // The date and time will be set automatically in the constructor

    public function getEmailDestinataire(): ?string
    {
        return $this->EmailDestinataire;
    }

    public function setEmailDestinataire(string $EmailDestinataire): static
    {
        $this->EmailDestinataire = $EmailDestinataire;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }
}
