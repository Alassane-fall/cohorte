<?php

namespace App\Controller;

use App\Entity\Cohorte;
use App\Form\CohorteType;
use App\Repository\CohorteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('')]
class CohorteController extends AbstractController
{
    #[Route('/', name: 'app_cohorte_index', methods: ['GET'])]
    public function index(CohorteRepository $cohorteRepository): Response
    {
        return $this->render('cohorte/index.html.twig', [
            'cohortes' => $cohorteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cohorte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CohorteRepository $cohorteRepository): Response
    {
        $cohorte = new Cohorte();
        $form = $this->createForm(CohorteType::class, $cohorte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cohorteRepository->save($cohorte, true);

            return $this->redirectToRoute('app_cohorte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cohorte/new.html.twig', [
            'cohorte' => $cohorte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cohorte_show', methods: ['GET'])]
    public function show(Cohorte $cohorte): Response
    {
        return $this->render('cohorte/show.html.twig', [
            'cohorte' => $cohorte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cohorte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cohorte $cohorte, CohorteRepository $cohorteRepository): Response
    {
        $form = $this->createForm(CohorteType::class, $cohorte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cohorteRepository->save($cohorte, true);

            return $this->redirectToRoute('app_cohorte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cohorte/edit.html.twig', [
            'cohorte' => $cohorte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cohorte_delete', methods: ['POST'])]
    public function delete(Request $request, Cohorte $cohorte, CohorteRepository $cohorteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cohorte->getId(), $request->request->get('_token'))) {
            $cohorteRepository->remove($cohorte, true);
        }

        return $this->redirectToRoute('app_cohorte_index', [], Response::HTTP_SEE_OTHER);
    }
}
