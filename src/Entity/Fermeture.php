<?php

namespace App\Entity;

use App\Repository\FermetureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FermetureRepository::class)]
class Fermeture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debut_fermeture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fin_fermeture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutFermeture(): ?\DateTimeInterface
    {
        return $this->debut_fermeture;
    }

    public function setDebutFermeture(\DateTimeInterface $debut_fermeture): self
    {
        $this->debut_fermeture = $debut_fermeture;

        return $this;
    }

    public function getFinFermeture(): ?\DateTimeInterface
    {
        return $this->fin_fermeture;
    }

    public function setFinFermeture(\DateTimeInterface $fin_fermeture): self
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
