<?php

namespace App\DataFixtures;

use App\Entity\Familiy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FamilyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 10; $i++) {
            $family = new Familiy();
            $family->setName("Family {$i}");
            $manager->persist($family);
        }
        $manager->flush();
    }
}
