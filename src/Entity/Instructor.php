<?php

namespace App\Entity;

use App\Repository\InstructorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstructorRepository::class)]
class Instructor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $firstname = null;

    #[ORM\Column(length: 64)]
    private ?string $lastname = null;

    #[ORM\Column(length: 20)]
    private ?string $id_number = null;

    #[ORM\Column(length: 20)]
    private ?string $licence_number = null;

    #[ORM\Column(nullable: true)]
    private ?float $rating = null;

    #[ORM\OneToMany(mappedBy: 'instructor', targetEntity: Course::class, orphanRemoval: true)]
    private Collection $courses;

    #[ORM\OneToOne(mappedBy: 'instructor', cascade: ['persist', 'remove'])]
    private ?Car $car = null;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getIdNumber(): ?string
    {
        return $this->id_number;
    }

    public function setIdNumber(string $id_number): static
    {
        $this->id_number = $id_number;

        return $this;
    }

    public function getLicenceNumber(): ?string
    {
        return $this->licence_number;
    }

    public function setLicenceNumber(string $licence_number): static
    {
        $this->licence_number = $licence_number;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): static
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->setInstructor($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): static
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getInstructor() === $this) {
                $course->setInstructor(null);
            }
        }

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): static
    {
        // set the owning side of the relation if necessary
        if ($car->getInstructor() !== $this) {
            $car->setInstructor($this);
        }

        $this->car = $car;

        return $this;
    }
}
