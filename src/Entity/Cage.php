<?php

namespace App\Entity;

use App\Repository\CageRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Aisle;
#[ORM\Table(name: "cages")]
#[ORM\Entity(repositoryClass: CageRepository::class)]
class Cage
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 255)]
private ?string $number = null;

#[ORM\Column(length: 255)]
private ?string $surface = null;

#[ORM\Column(length: 255)]
private ?string $capacity = null;

#[ORM\ManyToOne(inversedBy: 'cages')]
#[ORM\JoinColumn(nullable: false)]
private ?Aisle $aisle = null;

public function getId(): ?int
{
return $this->id;
}

public function getNumber(): ?string
{
return $this->number;
}

public function setNumber(string $number): static
{
$this->number = $number;
return $this;
}

public function getSurface(): ?string
{
return $this->surface;
}

public function setSurface(string $surface): static
{
$this->surface = $surface;
return $this;
}

public function getCapacity(): ?string
{
return $this->capacity;
}

public function setCapacity(string $capacity): static
{
$this->capacity = $capacity;
return $this;
}

public function getAisle(): ?Aisle
{
return $this->aisle;
}

public function setAisle(?Aisle $aisle): static
{
$this->aisle = $aisle;
return $this;
}
}
