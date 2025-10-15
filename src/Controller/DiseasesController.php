<?php

namespace App\Controller;

use App\Entity\Diseases;
use App\Form\DiseasesType;
use App\Repository\DiseasesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/diseases')]
final class DiseasesController extends AbstractController
{
    #[Route(name: 'app_diseases_index', methods: ['GET'])]
    public function index(DiseasesRepository $diseasesRepository): Response
    {
        return $this->render('diseases/index.html.twig', [
            'diseases' => $diseasesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_diseases_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $disease = new Diseases();
        $form = $this->createForm(DiseasesType::class, $disease);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($disease);
            $entityManager->flush();

            return $this->redirectToRoute('app_diseases_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('diseases/new.html.twig', [
            'disease' => $disease,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_diseases_show', methods: ['GET'])]
    public function show(Diseases $disease): Response
    {
        return $this->render('diseases/show.html.twig', [
            'disease' => $disease,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_diseases_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Diseases $disease, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DiseasesType::class, $disease);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_diseases_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('diseases/edit.html.twig', [
            'disease' => $disease,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_diseases_delete', methods: ['POST'])]
    public function delete(Request $request, Diseases $disease, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disease->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($disease);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_diseases_index', [], Response::HTTP_SEE_OTHER);
    }
}
