<?php

namespace App\DataFixtures;

use App\Entity\Genus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $genusArray = [
            "canis",
            "ovis",
            "bears",
            "sus",
        ];
        for ($i = 0; $i < 4; $i++) {

            $genus = new Genus();
            $genus->setName($genusArray[$i]);
            $manager->persist($genus);
        }
        $manager->flush();
    }
}
