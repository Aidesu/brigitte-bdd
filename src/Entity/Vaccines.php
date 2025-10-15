<?php

namespace App\Entity;

use App\Repository\VaccinesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinesRepository::class)]
class Vaccines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, MedicalBooklet>
     */
    #[ORM\ManyToMany(targetEntity: MedicalBooklet::class, mappedBy: 'vaccine')]
    private Collection $medicalBooklets;

    public function __construct()
    {
        $this->medicalBooklets = new ArrayCollection();
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

    /**
     * @return Collection<int, MedicalBooklet>
     */
    public function getMedicalBooklets(): Collection
    {
        return $this->medicalBooklets;
    }

    public function addMedicalBooklet(MedicalBooklet $medicalBooklet): static
    {
        if (!$this->medicalBooklets->contains($medicalBooklet)) {
            $this->medicalBooklets->add($medicalBooklet);
            $medicalBooklet->addVaccine($this);
        }

        return $this;
    }

    public function removeMedicalBooklet(MedicalBooklet $medicalBooklet): static
    {
        if ($this->medicalBooklets->removeElement($medicalBooklet)) {
            $medicalBooklet->removeVaccine($this);
        }

        return $this;
    }
}
