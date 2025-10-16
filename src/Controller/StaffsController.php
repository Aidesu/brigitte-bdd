<?php

namespace App\Controller;

use App\Entity\Staffs;
use App\Form\StaffsType;
use App\Repository\StaffsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/staffs')]
final class StaffsController extends AbstractController
{
    #[Route(name: 'app_staffs_index', methods: ['GET'])]
    public function index(StaffsRepository $staffsRepository): Response
    {
        return $this->render('staffs/index.html.twig', [
            'staffs' => $staffsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_staffs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $staff = new Staffs();
        $form = $this->createForm(StaffsType::class, $staff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($staff);
            $entityManager->flush();

            return $this->redirectToRoute('app_staffs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('staffs/new.html.twig', [
            'staff' => $staff,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_staffs_show', methods: ['GET'])]
    public function show(Staffs $staff): Response
    {
        return $this->render('staffs/show.html.twig', [
            'staff' => $staff,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_staffs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Staffs $staff, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StaffsType::class, $staff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_staffs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('staffs/edit.html.twig', [
            'staff' => $staff,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_staffs_delete', methods: ['POST'])]
    public function delete(Request $request, Staffs $staff, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$staff->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($staff);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_staffs_index', [], Response::HTTP_SEE_OTHER);
    }
}
