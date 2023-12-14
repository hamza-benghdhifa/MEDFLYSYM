<?php

namespace App\Entity;

use App\Repository\InvitationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InvitationsRepository::class)
 */
class Invitations
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="idinvi", type="integer")
     */
    private $idinvi;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailDestinataireinv", type="string", length=255)
     * @Assert\NotBlank(message="Votre email ne peut pas être vide")
     * @Assert\Email(message="Votre email '{{ value }}' n'est pas une adresse email valide.")
     */
    private $EmailDestinataireinv;

    /**
     * @var string
     *
     * @ORM\Column(name="Emailinv", type="string", length=255)
     * @Assert\NotBlank(message="Votre email ne peut pas être vide")
     * @Assert\Email(message="Votre email '{{ value }}' n'est pas une adresse email valide.")
     */
    private $Emailinv;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=255)
     */
    private $Status;

    public function __construct()
    {
        // Set the default values for Emailinv and Status
        $this->Emailinv = 'anis@esprit.tn';
        $this->Status = 'Pending';
    }


    public function getIdinvi(): ?int
    {
        return $this->idinvi;
    }

    public function getEmailDestinataireinv(): ?string
    {
        return $this->EmailDestinataireinv;
    }

    public function setEmailDestinataireinv(string $EmailDestinataireinv): static
    {
        $this->EmailDestinataireinv = $EmailDestinataireinv;

        return $this;
    }

    public function getEmailinv(): ?string
    {
        return $this->Emailinv;
    }

    public function setEmailinv(string $Emailinv): static
    {
        $this->Emailinv = $Emailinv;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }
}
