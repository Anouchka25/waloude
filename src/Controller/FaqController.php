<?php

namespace App\Controller;

use App\Entity\Faq;
use App\Form\FaqType;
use App\Repository\FaqRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/faq")
 */
class FaqController extends AbstractController
{
    /**
     * @Route("/", name="faq_index", methods={"GET"})
     */
    public function index(FaqRepository $faqRepository): Response
    {
        return $this->render('faq/index.html.twig', [
            'faqs' => $faqRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="faq_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $faq = new Faq();
        $form = $this->createForm(FaqType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($faq);
            $entityManager->flush();

            return $this->redirectToRoute('faq_index');
        }

        return $this->render('faq/new.html.twig', [
            'faq' => $faq,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="faq_show", methods={"GET"})
     */
    public function show(Faq $faq): Response
    {
        return $this->render('faq/show.html.twig', [
            'faq' => $faq,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="faq_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Faq $faq): Response
    {
        $form = $this->createForm(FaqType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('faq_index');
        }

        return $this->render('faq/edit.html.twig', [
            'faq' => $faq,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="faq_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Faq $faq): Response
    {
        if ($this->isCsrfTokenValid('delete'.$faq->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($faq);
            $entityManager->flush();
        }

        return $this->redirectToRoute('faq_index');
    }
}
