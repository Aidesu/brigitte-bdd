<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Familiy $family_id = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Genus $genus = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Species $species = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Orders $orders = null;

    #[ORM\ManyToOne(inversedBy: 'children')]
    private ?Animals $parent = null;

    #[ORM\OneToOne(inversedBy: 'animal', cascade: ['persist', 'remove'])]
    private ?MedicalBooklet $medical_booklet = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Menu $menu = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $origin = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $birth_date = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $arriving_date = null;

    #[ORM\Column(length: 500)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Adopters $adopters = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamilyId(): ?Familiy
    {
        return $this->family_id;
    }

    public function setFamilyId(?Familiy $family_id): static
    {
        $this->family_id = $family_id;

        return $this;
    }

    public function getGenus(): ?genus
    {
        return $this->genus;
    }

    public function setGenus(?genus $genus): static
    {
        $this->genus = $genus;

        return $this;
    }

    public function getSpecies(): ?species
    {
        return $this->species;
    }

    public function setSpecies(?species $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getOrders(): ?orders
    {
        return $this->orders;
    }

    public function setOrders(?orders $orders): static
    {
        $this->orders = $orders;

        return $this;
    }

    public function getParent(): ?animals
    {
        return $this->parent;
    }

    public function setParent(?animals $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    public function getMedicalBooklet(): ?MedicalBooklet
    {
        return $this->medical_booklet;
    }

    public function setMedicalBooklet(?MedicalBooklet $medical_booklet): static
    {
        $this->medical_booklet = $medical_booklet;

        return $this;
    }

    public function getMenu(): ?menu
    {
        return $this->menu;
    }

    public function setMenu(?menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): static
    {
        $this->origin = $origin;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birth_date;
    }

    public function setBirthDate(?\DateTimeImmutable $birth_date): static
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getArrivingDate(): ?\DateTimeImmutable
    {
        return $this->arriving_date;
    }

    public function setArrivingDate(?\DateTimeImmutable $arriving_date): static
    {
        $this->arriving_date = $arriving_date;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAdopters(): ?Adopters
    {
        return $this->adopters;
    }

    public function setAdopters(?Adopters $adopters): static
    {
        $this->adopters = $adopters;

        return $this;
    }
}
