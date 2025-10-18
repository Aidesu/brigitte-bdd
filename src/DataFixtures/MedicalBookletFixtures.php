<?php

namespace App\DataFixtures;

use App\Entity\MedicalBooklet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedicalBookletFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $vaccineDateArray = [
            new \DateTime('2025-10-13'),
            new \DateTime('2024-10-13'),
            new \DateTime('2023-08-16'),
            new \DateTime('2022-05-14'),
            new \DateTime('2021-02-17'),
            new \DateTime('2020-10-10'),

        ];

        $vaccineNextDayArray = [
            new \DateTime('2029-06-16'),
            new \DateTime('2030-06-13'),
            new \DateTime('2027-10-15'),
            new \DateTime('2026-01-14'),
            new \DateTime('2036-08-11'),
            new \DateTime('2028-04-10'),

        ];


        for ($i = 0; $i < 6; $i++) {

            $medicalBooklet = new MedicalBooklet();

            $medicalBooklet->setVaccineDate($vaccineDateArray[$i]);
            $medicalBooklet->setVaccineNextDay($vaccineNextDayArray[$i]);

            $manager->persist($medicalBooklet);
        }
        $manager->flush();
    }
}
