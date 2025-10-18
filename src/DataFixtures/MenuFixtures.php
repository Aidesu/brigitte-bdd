<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $menuArray = [
            "Menu Lion",
            "Menu Furet",
            "Menu Ours brun",
            "Menu Chien domestique",
            "Menu Cochon sauvage",
            "Menu Lapin",
            "Menu Cheval",
            "Menu Girafe",
            "Menu du Huemul",
        ];

        $meat_quantityArray = [
            1200,
            150,
            300,
            200,
            150,
            0,
            0,
            0,
            0,
        ];

        $vegetables_quantityArray = [
            0,
            5,
            400,
            300,
            500,
            300,
            700,
            800,
            700,
        ];

        for ($i = 0; $i < 9; $i++) {

            $menu = new Menu();

            $menu->setType($menuArray[$i]);
            $menu->setMeatQuantity($meat_quantityArray[$i]);
            $menu->setVegetablesQuantity($vegetables_quantityArray[$i]);
            $manager->persist($menu);
        }
        $manager->flush();
    }
}
