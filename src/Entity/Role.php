<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Staffs>
     */
    #[ORM\OneToMany(targetEntity: Staffs::class, mappedBy: 'Staff')]
    private Collection $staffs;

    public function __construct()
    {
        $this->staffs = new ArrayCollection();
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
     * @return Collection<int, Staffs>
     */
    public function getStaffs(): Collection
    {
        return $this->staffs;
    }

    public function addStaff(Staffs $staff): static
    {
        if (!$this->staffs->contains($staff)) {
            $this->staffs->add($staff);
            $staff->setStaff($this);
        }

        return $this;
    }

    public function removeStaff(Staffs $staff): static
    {
        if ($this->staffs->removeElement($staff)) {
            // set the owning side to null (unless already changed)
            if ($staff->getStaff() === $this) {
                $staff->setStaff(null);
            }
        }

        return $this;
    }
}
