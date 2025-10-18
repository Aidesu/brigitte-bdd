<?php

namespace App\Controller;

use App\Entity\Adopters;
use App\Repository\AdoptersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdoptersPage extends AbstractController {

    #[Route("/showadopters")]
    public function adoptPage(AdoptersRepository $adoptersRepository): Response {
        return $this->render("adoptersPage/adoptersHomePage.html.twig", [
            'adopters' => $adoptersRepository->findAll(),
        ]);
    }
}
