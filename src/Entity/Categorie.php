<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:cat']],
    denormalizationContext: ['groups' => ['write:cat']],
)]

class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Assert\Length(max: 20)]
    #[Groups(['read:cat', 'write:cat'])]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(max: 50)]
    #[Groups(['read:cat', 'write:cat', 'read:menu'])]
    private ?string $titreMenu = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(max: 50)]
    #[Groups(['read:cat', 'write:cat', 'read:plat'])]
    private ?string $titreCarte = null;

    #[ORM\Column()]
    #[Assert\GreaterThan(0)]
    #[Groups(['read:cat', 'write:cat', 'read:plat'])]
    private ?int $ordreCarte = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Plat::class)]
    private Collection $plats;

    public function __construct()
    {
        $this->plats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTitreMenu(): ?string
    {
        return $this->titreMenu;
    }

    public function setTitreMenu(string $titreMenu): self
    {
        $this->titreMenu = $titreMenu;

        return $this;
    }

    public function getTitreCarte(): ?string
    {
        return $this->titreCarte;
    }

    public function setTitreCarte(string $titreCarte): self
    {
        $this->titreCarte = $titreCarte;

        return $this;
    }

    /**
     * @return Collection<int, Plat>
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats->add($plat);
            $plat->setCategorie($this);
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getCategorie() === $this) {
                $plat->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getOrdreCarte(): ?int
    {
        return $this->ordreCarte;
    }

    public function setOrdreCarte(int $ordreCarte): self
    {
        $this->ordreCarte = $ordreCarte;

        return $this;
    }
}
