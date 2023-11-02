<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $licence_plate = null;

    #[ORM\Column(length: 15)]
    private ?string $make = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(length: 15)]
    private ?string $transmission = null;

    #[ORM\OneToOne(inversedBy: 'car', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Instructor $instructor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicencePlate(): ?string
    {
        return $this->licence_plate;
    }

    public function setLicencePlate(string $licence_plate): static
    {
        $this->licence_plate = $licence_plate;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(string $make): static
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(string $transmission): static
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getInstructor(): ?Instructor
    {
        return $this->instructor;
    }

    public function setInstructor(Instructor $instructor): static
    {
        $this->instructor = $instructor;

        return $this;
    }
}
