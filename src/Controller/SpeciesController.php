<?php

namespace App\Controller;

use App\Entity\Species;
use App\Form\SpeciesType;
use App\Repository\SpeciesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/species')]
final class SpeciesController extends AbstractController
{
    #[Route(name: 'app_species_index', methods: ['GET'])]
    public function index(SpeciesRepository $speciesRepository): Response
    {
        return $this->render('species/index.html.twig', [
            'species' => $speciesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_species_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $species = new Species();
        $form = $this->createForm(SpeciesType::class, $species);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($species);
            $entityManager->flush();

            return $this->redirectToRoute('app_species_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('species/new.html.twig', [
            'species' => $species,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_species_show', methods: ['GET'])]
    public function show(Species $species): Response
    {
        return $this->render('species/show.html.twig', [
            'species' => $species,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_species_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Species $species, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpeciesType::class, $species);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_species_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('species/edit.html.twig', [
            'species' => $species,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_species_delete', methods: ['POST'])]
    public function delete(Request $request, Species $species, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$species->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($species);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_species_index', [], Response::HTTP_SEE_OTHER);
    }
}
