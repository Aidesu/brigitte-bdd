<?php

namespace App\Controller;

use App\Entity\Aisle;
use App\Form\AisleType;
use App\Repository\AisleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/aisle')]
final class AisleController extends AbstractController
{
    #[Route(name: 'app_aisle_index', methods: ['GET'])]
    public function index(AisleRepository $aisleRepository): Response
    {
        return $this->render('aisle/index.html.twig', [
            'aisles' => $aisleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_aisle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aisle = new Aisle();
        $form = $this->createForm(AisleType::class, $aisle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aisle);
            $entityManager->flush();

            return $this->redirectToRoute('app_aisle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aisle/new.html.twig', [
            'aisle' => $aisle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_aisle_show', methods: ['GET'])]
    public function show(Aisle $aisle): Response
    {
        return $this->render('aisle/show.html.twig', [
            'aisle' => $aisle,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_aisle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Aisle $aisle, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AisleType::class, $aisle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_aisle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aisle/edit.html.twig', [
            'aisle' => $aisle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_aisle_delete', methods: ['POST'])]
    public function delete(Request $request, Aisle $aisle, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aisle->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($aisle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_aisle_index', [], Response::HTTP_SEE_OTHER);
    }
}
