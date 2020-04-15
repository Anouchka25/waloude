<?php

namespace App\Controller;

use App\Entity\Souscripteur;
use App\Entity\Enfant;
use App\Form\SouscripteurType;
use App\Repository\SouscripteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/souscripteur")
 */
class SouscripteurController extends AbstractController
{
    /**
     * @Route("/", name="souscripteur_index", methods={"GET"})
     */
    public function index(SouscripteurRepository $souscripteurRepository): Response
    {
        return $this->render('souscripteur/index.html.twig', [
            'souscripteurs' => $souscripteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="souscripteur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $souscripteur = new Souscripteur();

        $ref = strtoupper (uniqid()); //uniqid — Génère un identifiant unique 
                                     //strtoupper — Renvoie une chaîne en majuscules
        $souscripteur->setReference($ref);

        $enfant = new Enfant();
        $souscripteur->addEnfant($enfant);

        $form = $this->createForm(SouscripteurType::class, $souscripteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($souscripteur);
            $entityManager->flush();

            return $this->redirectToRoute('souscripteur_index');
        }

        return $this->render('souscripteur/new.html.twig', [
            'souscripteur' => $souscripteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="souscripteur_show", methods={"GET"})
     */
    public function show(Souscripteur $souscripteur): Response
    {
        return $this->render('souscripteur/show.html.twig', [
            'souscripteur' => $souscripteur,
        ]);
    }

    /**
     * @Route("/moncompte", name="moncompte", methods={"GET"})
     */
    public function moncompte()
    {
        return $this->render('souscripteur/moncompte.html.twig');
    }

    /**
     * @Route("/{id}/edit", name="souscripteur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Souscripteur $souscripteur): Response
    {
        $form = $this->createForm(SouscripteurType::class, $souscripteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('souscripteur_index');
        }

        return $this->render('souscripteur/edit.html.twig', [
            'souscripteur' => $souscripteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="souscripteur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Souscripteur $souscripteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$souscripteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($souscripteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('souscripteur_index');
    }
}
