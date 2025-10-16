<?php

namespace App\Entity;

use App\Repository\StaffsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffsRepository::class)]
class Staffs
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 255)]
private ?string $name = null;

#[ORM\Column(length: 255)]
private ?string $birthDate = null;

#[ORM\Column(length: 255)]
private ?string $gender = null;

#[ORM\Column(length: 255)]
private ?string $city = null;

#[ORM\ManyToOne(inversedBy: 'staffs')]
#[ORM\JoinColumn(nullable: false)]
private ?Role $role = null;

#[ORM\ManyToMany(targetEntity: Cage::class, inversedBy: 'staffs')]
private Collection $cages;


#[ORM\ManyToMany(targetEntity: Aisle::class, inversedBy: 'staffs')]
private Collection $aisles;

public function __construct()
{
$this->cages = new ArrayCollection();
$this->aisles = new ArrayCollection();
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

public function getBirthDate(): ?string
{
return $this->birthDate;
}

public function setBirthDate(string $birthDate): static
{
$this->birthDate = $birthDate;
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

public function getCity(): ?string
{
return $this->city;
}

public function setCity(string $city): static
{
$this->city = $city;
return $this;
}

public function getRole(): ?Role
{
return $this->role;
}

public function setRole(?Role $role): static
{
$this->role = $role;
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
}
return $this;
}

public function removeCage(Cage $cage): static
{
$this->cages->removeElement($cage);
return $this;
}

/**
* @return Collection<int, Aisle>
*/
public function getAisles(): Collection
{
return $this->aisles;
}

public function addAisle(Aisle $aisle): static
{
if (!$this->aisles->contains($aisle)) {
$this->aisles->add($aisle);
}
return $this;
}

public function removeAisle(Aisle $aisle): static
{
$this->aisles->removeElement($aisle);
return $this;
}
}