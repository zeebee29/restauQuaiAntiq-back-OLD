<?php

namespace App\Entity;

use App\Repository\OuvertureHebdoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: OuvertureHebdoRepository::class)]
class OuvertureHebdo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\Choice(choices: ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"])]
    private ?string $jourSemaine = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $h_ouverture = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $h_fermeture = null;

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
        return $this->h_ouverture;
    }

    public function setHOuverture(\DateTime $h_ouverture): self
    {
        $this->h_ouverture = $h_ouverture;

        return $this;
    }

    public function getHFermeture(): ?\DateTime
    {
        return $this->h_fermeture;
    }

    public function setHFermeture(\DateTime $h_fermeture): self
    {
        $this->h_fermeture = $h_fermeture;

        return $this;
    }
}
