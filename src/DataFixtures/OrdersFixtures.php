<?php

namespace App\DataFixtures;
use App\Entity\Orders;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrdersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
 
        $ordersArray=[
    "Carnivora",
	"Primates",
	"Rodentia",
	"Lagomorpha",
	"Artiodactyla",
	"Squamata",
	"Crocodylia",
	"Rhynchocephalia",
	"Gymnophiona",
    "Salmoniformes",
	"Siluriformes",
        ];
for ($i = 0; $i < 10; $i++){

$orders= new Orders();
$orders->setName($ordersArray[$i]);
$manager->persist($orders);
}
        $manager->flush();

    }
}
