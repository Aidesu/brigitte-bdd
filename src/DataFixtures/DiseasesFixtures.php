<?php

namespace App\DataFixtures;

use App\Entity\Diseases;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DiseasesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $diseases = [
        "Peste bubonique",
        "Anthrax",
        "Lèpre",
        "Choléra",
        "Typhus",
        "Tuberculose",
        "Tularémie",
        "Fièvre typhoïde",
        "Fièvre Ebola",
        "Rage",
        "Dengue",
        "Malaria",
        "Bilharziose"];

        for ($i = 0; $i < 13; $i++){
            $disease = new Diseases();
            $disease->setName($diseases[$i]);
            $manager->persist($disease);
        }
        $manager->flush();
    }
}
