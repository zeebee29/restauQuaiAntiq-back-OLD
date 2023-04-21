<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\datetime(format: 'd/m/Y h:i:s')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true, type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank()]
    #[Assert\datetime(format: 'd/m/Y h:i:s')]
    private ?\DateTime $modifiedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    #[Assert\datetime(format: 'd/m/Y h:i:s')]
    private ?\DateTime $date_reservation = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\NotBlank()]
    private ?int $nb_convive = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(255)]
    private ?string $allergie = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull()]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
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
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTime $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getNbConvive(): ?int
    {
        return $this->nb_convive;
    }

    public function setNbConvive(int $nb_convive): self
    {
        $this->nb_convive = $nb_convive;

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
}
