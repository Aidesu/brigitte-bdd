<?php

namespace App\Controller;

use App\Entity\Cage;
use App\Form\CageType;
use App\Repository\CageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cage')]
final class CageController extends AbstractController
{
    #[Route(name: 'app_cage_index', methods: ['GET'])]
    public function index(CageRepository $cageRepository): Response
    {
        return $this->render('cage/index.html.twig', [
            'cages' => $cageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cage = new Cage();
        $form = $this->createForm(CageType::class, $cage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cage);
            $entityManager->flush();

            return $this->redirectToRoute('app_cage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cage/new.html.twig', [
            'cage' => $cage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cage_show', methods: ['GET'])]
    public function show(Cage $cage): Response
    {
        return $this->render('cage/show.html.twig', [
            'cage' => $cage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cage $cage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CageType::class, $cage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cage/edit.html.twig', [
            'cage' => $cage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cage_delete', methods: ['POST'])]
    public function delete(Request $request, Cage $cage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cage->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($cage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cage_index', [], Response::HTTP_SEE_OTHER);
    }
}
