<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OuvertureExceptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OuvertureExceptRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:open']],
    denormalizationContext: ['groups' => ['write:open']],
)]
class OuvertureExcept
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Groups(['read:open', 'write:open'])]
    private ?\DateTime $dateOuverture = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(255)]
    #[Groups(['read:open', 'write:open'])]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOuverture(): ?\DateTime
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(?\DateTime $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

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
