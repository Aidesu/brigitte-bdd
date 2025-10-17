<?php

namespace App\DataFixtures;
use App\Entity\Cage;
use App\Entity\Aisle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AisleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $aisleArray =[
            'Aisle 1',
            'Aisle 2',
            'Aisle 3',
            'Aisle 4',
            'Aisle 5',
            'Aisle 6'

        ];
        
        foreach ($aisleArray as $name) {
            $cage = new Cage();
            $cage->setName($name);
            $manager->persist($cage);
        }
        $manager->flush();
    }
}
