<?php

namespace App\Entity;

use App\Repository\MedicalBookletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicalBookletRepository::class)]
class MedicalBooklet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $vaccine_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $vaccine_next_day = null;

    /**
     * @var Collection<int, Diseases>
     */
    #[ORM\ManyToMany(targetEntity: Diseases::class, inversedBy: 'medicalBooklets')]
    private Collection $disease;

    /**
     * @var Collection<int, Vaccines>
     */
    #[ORM\ManyToMany(targetEntity: Vaccines::class, inversedBy: 'medicalBooklets')]
    private Collection $vaccine;

    #[ORM\OneToOne(mappedBy: 'medical_booklet', cascade: ['persist', 'remove'])]
    private ?Animals $animal = null;

    public function __construct()
    {
        $this->disease = new ArrayCollection();
        $this->vaccine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVaccineDate(): ?\DateTime
    {
        return $this->vaccine_date;
    }

    public function setVaccineDate(\DateTime $vaccine_date): static
    {
        $this->vaccine_date = $vaccine_date;

        return $this;
    }

    public function getVaccineNextDay(): ?\DateTime
    {
        return $this->vaccine_next_day;
    }

    public function setVaccineNextDay(\DateTime $vaccine_next_day): static
    {
        $this->vaccine_next_day = $vaccine_next_day;

        return $this;
    }

    /**
     * @return Collection<int, Diseases>
     */
    public function getDisease(): Collection
    {
        return $this->disease;
    }

    public function addDisease(Diseases $disease): static
    {
        if (!$this->disease->contains($disease)) {
            $this->disease->add($disease);
        }

        return $this;
    }

    public function removeDisease(Diseases $disease): static
    {
        $this->disease->removeElement($disease);

        return $this;
    }

    /**
     * @return Collection<int, Vaccines>
     */
    public function getVaccine(): Collection
    {
        return $this->vaccine;
    }

    public function addVaccine(Vaccines $vaccine): static
    {
        if (!$this->vaccine->contains($vaccine)) {
            $this->vaccine->add($vaccine);
        }

        return $this;
    }

    public function removeVaccine(Vaccines $vaccine): static
    {
        $this->vaccine->removeElement($vaccine);

        return $this;
    }

    public function getAnimal(): ?Animals
    {
        return $this->animal;
    }

    public function setAnimal(?Animals $animal): static
    {
        // unset the owning side of the relation if necessary
        if ($animal === null && $this->animal !== null) {
            $this->animal->setMedicalBooklet(null);
        }

        // set the owning side of the relation if necessary
        if ($animal !== null && $animal->getMedicalBooklet() !== $this) {
            $animal->setMedicalBooklet($this);
        }

        $this->animal = $animal;

        return $this;
    }
}
