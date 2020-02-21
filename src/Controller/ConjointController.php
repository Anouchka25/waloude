<?php

namespace App\Controller;

use App\Entity\Conjoint;
use App\Form\ConjointType;
use App\Repository\ConjointRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/conjoint")
 */
class ConjointController extends AbstractController
{
    /**
     * @Route("/", name="conjoint_index", methods={"GET"})
     */
    public function index(ConjointRepository $conjointRepository): Response
    {
        return $this->render('conjoint/index.html.twig', [
            'conjoints' => $conjointRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="conjoint_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conjoint = new Conjoint();
        $form = $this->createForm(ConjointType::class, $conjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conjoint);
            $entityManager->flush();

            return $this->redirectToRoute('conjoint_index');
        }

        return $this->render('conjoint/new.html.twig', [
            'conjoint' => $conjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conjoint_show", methods={"GET"})
     */
    public function show(Conjoint $conjoint): Response
    {
        return $this->render('conjoint/show.html.twig', [
            'conjoint' => $conjoint,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="conjoint_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Conjoint $conjoint): Response
    {
        $form = $this->createForm(ConjointType::class, $conjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conjoint_index');
        }

        return $this->render('conjoint/edit.html.twig', [
            'conjoint' => $conjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conjoint_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Conjoint $conjoint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conjoint->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conjoint);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conjoint_index');
    }
}
