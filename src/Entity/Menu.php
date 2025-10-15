<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $meat_quantity = null;

    #[ORM\Column]
    private ?int $vegetables_quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getMeatQuantity(): ?int
    {
        return $this->meat_quantity;
    }

    public function setMeatQuantity(int $meat_quantity): static
    {
        $this->meat_quantity = $meat_quantity;

        return $this;
    }

    public function getVegetablesQuantity(): ?int
    {
        return $this->vegetables_quantity;
    }

    public function setVegetablesQuantity(int $vegetables_quantity): static
    {
        $this->vegetables_quantity = $vegetables_quantity;

        return $this;
    }
}
