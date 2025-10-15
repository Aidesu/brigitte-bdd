<?php

namespace App\Controller;

use App\Entity\Familiy;
use App\Form\FamiliyType;
use App\Repository\FamiliyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/familiy')]
final class FamiliyController extends AbstractController
{
    #[Route(name: 'app_familiy_index', methods: ['GET'])]
    public function index(FamiliyRepository $familiyRepository): Response
    {
        return $this->render('familiy/index.html.twig', [
            'familiys' => $familiyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_familiy_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $familiy = new Familiy();
        $form = $this->createForm(FamiliyType::class, $familiy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($familiy);
            $entityManager->flush();

            return $this->redirectToRoute('app_familiy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('familiy/new.html.twig', [
            'familiy' => $familiy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_familiy_show', methods: ['GET'])]
    public function show(Familiy $familiy): Response
    {
        return $this->render('familiy/show.html.twig', [
            'familiy' => $familiy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_familiy_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Familiy $familiy, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FamiliyType::class, $familiy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_familiy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('familiy/edit.html.twig', [
            'familiy' => $familiy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_familiy_delete', methods: ['POST'])]
    public function delete(Request $request, Familiy $familiy, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$familiy->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($familiy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_familiy_index', [], Response::HTTP_SEE_OTHER);
    }
}
