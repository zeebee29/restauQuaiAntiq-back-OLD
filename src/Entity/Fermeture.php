<?php

namespace App\Entity;

use App\Repository\FermetureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FermetureRepository::class)]
class Fermeture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'Y-m-d')]
    private ?\DateTime $debut_fermeture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'Y-m-d')]
    private ?\DateTime $fin_fermeture = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(255)]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutFermeture(): ?\DateTime
    {
        return $this->debut_fermeture;
    }

    public function setDebutFermeture(\DateTime $debut_fermeture): self
    {
        $this->debut_fermeture = $debut_fermeture;

        return $this;
    }

    public function getFinFermeture(): ?\DateTime
    {
        return $this->fin_fermeture;
    }

    public function setFinFermeture(\DateTime $fin_fermeture): self
    {
        $this->fin_fermeture = $fin_fermeture;

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
}
