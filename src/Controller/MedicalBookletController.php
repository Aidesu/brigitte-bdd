<?php

namespace App\Controller;

use App\Entity\MedicalBooklet;
use App\Form\MedicalBookletType;
use App\Repository\MedicalBookletRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/medical/booklet')]
final class MedicalBookletController extends AbstractController
{
    #[Route(name: 'app_medical_booklet_index', methods: ['GET'])]
    public function index(MedicalBookletRepository $medicalBookletRepository): Response
    {
        return $this->render('medical_booklet/index.html.twig', [
            'medical_booklets' => $medicalBookletRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medical_booklet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medicalBooklet = new MedicalBooklet();
        $form = $this->createForm(MedicalBookletType::class, $medicalBooklet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medicalBooklet);
            $entityManager->flush();

            return $this->redirectToRoute('app_medical_booklet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medical_booklet/new.html.twig', [
            'medical_booklet' => $medicalBooklet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medical_booklet_show', methods: ['GET'])]
    public function show(MedicalBooklet $medicalBooklet): Response
    {
        return $this->render('medical_booklet/show.html.twig', [
            'medical_booklet' => $medicalBooklet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medical_booklet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MedicalBooklet $medicalBooklet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MedicalBookletType::class, $medicalBooklet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medical_booklet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medical_booklet/edit.html.twig', [
            'medical_booklet' => $medicalBooklet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medical_booklet_delete', methods: ['POST'])]
    public function delete(Request $request, MedicalBooklet $medicalBooklet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicalBooklet->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($medicalBooklet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medical_booklet_index', [], Response::HTTP_SEE_OTHER);
    }
}
