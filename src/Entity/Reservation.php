<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read:book']],
    denormalizationContext: ['groups' => ['write:book']],
)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'd/m/Y h:i:s')]
    #[Groups(['read:book'])]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(nullable: true, type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'd/m/Y h:i:s')]
    #[Groups(['read:book'])]
    private ?\DateTime $modifiedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\DateTime(format: 'd/m/Y h:i:s')]
    //#[Assert\DateTime()]
    #[Groups(['read:book', 'write:book'])]
    private ?\DateTime $dateReservation = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Groups(['read:book', 'write:book'])]
    private ?int $nbConvive = 0;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(255)]
    #[Groups(['read:book', 'write:book'])]
    private ?string $allergie = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull()]
    #[Groups(['read:book', 'write:book'])]
    private ?User $user = null;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->modifiedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getModifiedAt(): ?\DateTime
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTime $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getDateReservation(): ?\DateTime
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTime $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getNbConvive(): ?int
    {
        return $this->nbConvive;
    }

    public function setNbConvive(int $nbConvive): self
    {
        $this->nbConvive = $nbConvive;

        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->allergie;
    }

    public function setAllergie(?string $allergie): self
    {
        $this->allergie = $allergie;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function __toString()
    {
        return $this->dateReservation->format('d-m-Y - H:i');
    }
}
