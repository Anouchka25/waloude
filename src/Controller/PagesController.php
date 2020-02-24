<?php

namespace App\Controller;

use App\Entity\Pages;
use App\Form\PagesType;
use App\Repository\PagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pages")
 */
class PagesController extends AbstractController
{
    /**
     * @Route("/", name="pages_index", methods={"GET"})
     */
    public function index(PagesRepository $pagesRepository): Response
    {
        return $this->render('pages/index.html.twig', [
            'pages' => $pagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pages_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $page = new Pages();
        $form = $this->createForm(PagesType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($page);
            $entityManager->flush();

            return $this->redirectToRoute('pages_index');
        }

        return $this->render('pages/new.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/politique-de-confidentialite", name="politique-de-confidentialite", methods={"GET"})
     */
    public function politique(): Response
    {
        return $this->render('pages/politique.html.twig');
    }

        /**
     * @Route("/waloude", name="waloude", methods={"GET"})
     */
    public function waloude(): Response
    {
        return $this->render('pages/waloude.html.twig');
    }

    /**
     * @Route("/{id}/edit", name="pages_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pages $page): Response
    {
        $form = $this->createForm(PagesType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pages_index');
        }

        return $this->render('pages/edit.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pages_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pages $page): Response
    {
        if ($this->isCsrfTokenValid('delete'.$page->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($page);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pages_index');
    }
}
