<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Repository\AnimalsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdoptAnimals extends AbstractController {

    #[Route("/adopt")]
    public function adoptPage(AnimalsRepository $animalsRepository): Response {
        return $this->render("adoptAnimals/adoptAnimals.html.twig", [
            'animals' => $animalsRepository->findAll(),
        ]);
    }
}
