<?php

namespace App\Controller;

use App\Entity\Genus;
use App\Form\GenusType;
use App\Repository\GenusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/genus')]
final class GenusController extends AbstractController
{
    #[Route(name: 'app_genus_index', methods: ['GET'])]
    public function index(GenusRepository $genusRepository): Response
    {
        return $this->render('genus/index.html.twig', [
            'genera' => $genusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_genus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $genu = new Genus();
        $form = $this->createForm(GenusType::class, $genu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($genu);
            $entityManager->flush();

            return $this->redirectToRoute('app_genus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('genus/new.html.twig', [
            'genu' => $genu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_genus_show', methods: ['GET'])]
    public function show(Genus $genu): Response
    {
        return $this->render('genus/show.html.twig', [
            'genu' => $genu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_genus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Genus $genu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GenusType::class, $genu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_genus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('genus/edit.html.twig', [
            'genu' => $genu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_genus_delete', methods: ['POST'])]
    public function delete(Request $request, Genus $genu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$genu->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($genu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_genus_index', [], Response::HTTP_SEE_OTHER);
    }
}
