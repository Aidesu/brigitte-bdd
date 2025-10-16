<?php

namespace App\Controller;

use App\Entity\Adopters;
use App\Form\AdoptersType;
use App\Repository\AdoptersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adopters')]
final class AdoptersController extends AbstractController
{
    #[Route(name: 'app_adopters_index', methods: ['GET'])]
    public function index(AdoptersRepository $adoptersRepository): Response
    {
        return $this->render('adopters/index.html.twig', [
            'adopters' => $adoptersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adopters_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adopter = new Adopters();
        $form = $this->createForm(AdoptersType::class, $adopter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adopter);
            $entityManager->flush();

            return $this->redirectToRoute('app_adopters_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adopters/new.html.twig', [
            'adopter' => $adopter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adopters_show', methods: ['GET'])]
    public function show(Adopters $adopter): Response
    {
        return $this->render('adopters/show.html.twig', [
            'adopter' => $adopter,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adopters_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adopters $adopter, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdoptersType::class, $adopter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adopters_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adopters/edit.html.twig', [
            'adopter' => $adopter,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adopters_delete', methods: ['POST'])]
    public function delete(Request $request, Adopters $adopter, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adopter->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($adopter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adopters_index', [], Response::HTTP_SEE_OTHER);
    }
}
