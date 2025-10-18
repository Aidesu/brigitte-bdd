<?php

namespace App\DataFixtures;

use App\Entity\Vaccines;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VaccinesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $vaccinesArray = [
            "EV76, F1-V",
            "BioThrax®",
            "BCG",
            "Dukoral®",
            "Vaccin Cox-type",
            "BCG",
            "LVS",
            "Ty21a",
            "Ervebo®",
            "RabAvert®",
            "Dengvaxia®",
            "RTS,S/AS01",
            "Sm-p80",
            "Mosquirix®",
            "R21/Matrix-M®"
        ];

        for ($i = 0; $i < 15; $i++) {
            $vaccines = new Vaccines();
            $vaccines->setName($vaccinesArray[$i]);
            $manager->persist($vaccines);
        }
        $manager->flush();
    }
}
