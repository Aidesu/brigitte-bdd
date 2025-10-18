<?php

namespace App\DataFixtures;

use App\Entity\Species;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpeciesFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{
		$speciesArray = [
			"Panthera leo",
			"Gorilla gorilla",
			"Pan troglodytes",
			"Rattus norvegicus",
			"Passer domesticus",
			"Salmo salar",
			"Ictalurus punctatus",
			"Loxodonta africana",
			"Delphinus delphis",
		];
		for ($i = 0; $i < 9; $i++) {

			$species = new Species();
			$species->setName($speciesArray[$i]);
			$species->setAdoptable("yes");
			$manager->persist($species);
		}
		$manager->flush();
	}
}
