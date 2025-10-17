<?php

namespace App\DataFixtures;

use App\Entity\Cage;
use App\Entity\Aisle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    { 
        $cagesArray = [
            'Cage A1',
            'Cage A2',
            'Cage B1',
            'Cage B2',
            'Cage C1',
            'Cage C2',
            'Cage D1',
            'Cage D2',
            'Cage E1',
            'Cage E2'
        ];
/*
   for ( $j =1; $j<=2; $j++){
   $cage = new Cage();
   $cage -> setNumber("$j");
   $cage -> getNumbe();
   $cage -> getSurface() ;
   $manager->persist($cage); 

 }*/
        foreach ($cagesArray as $id) {
            $cage = new Cage();
            $cage->getId($id);
            $manager->persist($cage);
            }
            

        $manager->flush();
    }
}