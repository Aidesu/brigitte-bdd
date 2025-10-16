<?php

namespace App\Controller;

use App\Entity\Vaccines;
use App\Form\VaccinesType;
use App\Repository\VaccinesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/vaccines')]
final class VaccinesController extends AbstractController
{
    #[Route(name: 'app_vaccines_index', methods: ['GET'])]
    public function index(VaccinesRepository $vaccinesRepository): Response
    {
        return $this->render('vaccines/index.html.twig', [
            'vaccines' => $vaccinesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vaccines_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vaccine = new Vaccines();
        $form = $this->createForm(VaccinesType::class, $vaccine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vaccine);
            $entityManager->flush();

            return $this->redirectToRoute('app_vaccines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vaccines/new.html.twig', [
            'vaccine' => $vaccine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vaccines_show', methods: ['GET'])]
    public function show(Vaccines $vaccine): Response
    {
        return $this->render('vaccines/show.html.twig', [
            'vaccine' => $vaccine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vaccines_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vaccines $vaccine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VaccinesType::class, $vaccine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_vaccines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vaccines/edit.html.twig', [
            'vaccine' => $vaccine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vaccines_delete', methods: ['POST'])]
    public function delete(Request $request, Vaccines $vaccine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vaccine->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($vaccine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_vaccines_index', [], Response::HTTP_SEE_OTHER);
    }
}
