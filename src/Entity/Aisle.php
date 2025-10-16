<?php

namespace App\Entity;

use App\Repository\AisleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AisleRepository::class)]
class Aisle
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 255)]
private ?string $name = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $description = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $floor = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $block = null;

#[ORM\OneToMany(targetEntity: Cage::class, mappedBy: 'aisle')]
private Collection $cages;

public function __construct()
{
$this->cages = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
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

public function getDescription(): ?string
{
return $this->description;
}

public function setDescription(?string $description): static
{
$this->description = $description;
return $this;
}

public function getFloor(): ?string
{
return $this->floor;
}

public function setFloor(?string $floor): static
{
$this->floor = $floor;
return $this;
}

public function getBlock(): ?string
{
return $this->block;
}

public function setBlock(?string $block): static
{
$this->block = $block;
return $this;
}

/**
* @return Collection<int, Cage>
*/
public function getCages(): Collection
{
return $this->cages;
}

public function addCage(Cage $cage): static
{
if (!$this->cages->contains($cage)) {
$this->cages->add($cage);
$cage->setAisle($this);
}
return $this;
}

public function removeCage(Cage $cage): static
{
if ($this->cages->removeElement($cage)) {
if ($cage->getAisle() === $this) {
$cage->setAisle(null);
}
}
return $this;
}
}