<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FermetureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FermetureRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:closed']],
    denormalizationContext: ['groups' => ['write:closed']],
)]
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
    private ?\DateTime $debutFermeture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'Y-m-d')]
    private ?\DateTime $finFermeture = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(255)]
    #[Groups(['read:closed', 'write:closed'])]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutFermeture(): ?\DateTime
    {
        return $this->debutFermeture;
    }

    public function setDebutFermeture(\DateTime $debutFermeture): self
    {
        $this->debutFermeture = $debutFermeture;

        return $this;
    }

    public function getFinFermeture(): ?\DateTime
    {
        return $this->finFermeture;
    }

    public function setFinFermeture(\DateTime $finFermeture): self
    {
        $this->finFermeture = $finFermeture;

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
