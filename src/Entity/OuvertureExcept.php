<?php

namespace App\Entity;

use App\Repository\OuvertureExceptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OuvertureExceptRepository::class)]
class OuvertureExcept
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?\DateTime $date_ouverture = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(255)]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOuverture(): ?\DateTime
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(?\DateTime $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

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
