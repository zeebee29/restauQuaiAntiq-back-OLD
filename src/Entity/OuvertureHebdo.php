<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OuvertureHebdoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: OuvertureHebdoRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:week']],
    denormalizationContext: ['groups' => ['write:week']],
)]
class OuvertureHebdo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\Length(10)]
    #[Assert\Choice(choices: ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"])]
    #[Groups(['read:week', 'write:week'])]
    private ?string $jourSemaine = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?\DateTime $hOuverture = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?\DateTime $hFermeture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourSemaine(): ?string
    {
        return $this->jourSemaine;
    }

    public function setJourSemaine(string $jourSemaine): self
    {
        $this->jourSemaine = $jourSemaine;

        return $this;
    }

    public function getHOuverture(): ?\DateTime
    {
        return $this->hOuverture;
    }

    public function setHOuverture(\DateTime $hOuverture): self
    {
        $this->hOuverture = $hOuverture;

        return $this;
    }

    public function getHFermeture(): ?\DateTime
    {
        return $this->hFermeture;
    }

    public function setHFermeture(\DateTime $hFermeture): self
    {
        $this->hFermeture = $hFermeture;

        return $this;
    }
}
