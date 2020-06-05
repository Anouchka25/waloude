<?php

namespace App\Controller;

use App\Entity\Souscripteur;
use App\Entity\Enfant;
use App\Entity\Beneficiaire;
use App\Form\SouscripteurType;
use App\Repository\SouscripteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Service\FileUploader;
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
     * @Route("/moncompte", name="moncompte") //, methods={"GET"}
     */
    public function moncompte()
    {
        return $this->render('souscripteur/moncompte.html.twig');
    }

    /**
     * @Route("/new", name="souscripteur_new", methods={"GET","POST"})
     */
    public function new(Request $request, 
    FileUploader $fileUploader1, 
    FileUploader $fileUploader2, 
    FileUploader $fileUploader3, 
    FileUploader $fileUploader4, 
    FileUploader $fileUploader5, 
    FileUploader $fileUploader6): Response
    {
        $souscripteur = new Souscripteur();

        $ref = strtoupper (uniqid()); //uniqid — Génère un identifiant unique 
                                     //strtoupper — Renvoie une chaîne en majuscules
        $souscripteur->setReference($ref);

        $enfant = new Enfant();
        $souscripteur->addEnfant($enfant);

        $beneficiaire = new Beneficiaire();
        $souscripteur->addBeneficiaire($beneficiaire);

        $form = $this->createForm(SouscripteurType::class, $souscripteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $cartrecto1File = $form->get('cartRecto1')->getData();
            $cartverso1File = $form->get('cartVerso1')->getData();

            $cartrecto2File = $form->get('cartRecto2')->getData();
            $cartverso2File = $form->get('cartVerso2')->getData();

            $compoMenageFile = $form->get('compoMenage')->getData();
            $autreDocFile = $form->get('autreDoc')->getData();

            if(($cartrecto1File instanceof UploadedFile) && ($cartverso1File instanceof UploadedFile)
             && 
             ($cartrecto2File instanceof UploadedFile) && ($cartverso2File instanceof UploadedFile
              &&
              ($compoMenageFile instanceof UploadedFile) && ($autreDocFile instanceof UploadedFile))){
                
                $recto1fileName = $fileUploader1->upload($cartrecto1File);
                $verso1fileName = $fileUploader2->upload($cartverso1File);

                $recto2fileName = $fileUploader3->upload($cartrecto2File);
                $verso2fileName = $fileUploader4->upload($cartverso2File);

                $compofileName = $fileUploader5->upload($compoMenageFile);
                $autrefileName = $fileUploader6->upload($autreDocFile);

                $souscripteur->setCartRecto1($recto1fileName);
                $souscripteur->setCartVerso1($verso1fileName);

                $souscripteur->setCartRecto2($recto2fileName);
                $souscripteur->setCartVerso1($verso2fileName);

                $souscripteur->setCompoMenage($compofileName);
                $souscripteur->setAutreDoc($autrefileName);

            }

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

    /**
   * @Route("souscripteurpdf/{id}", name="souscripteurpdf", methods={"GET"})
     */
    public function showPdf(Souscripteur $souscripteur): Response
    {
        $template = $this->render('souscripteur/souscripteurPDF.html.twig', [
            'souscripteur' => $souscripteur,
        ]);

      $html2pdf = new T_Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
      $html2pdf->create('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));

      return $html2pdf->generatePdf($template, "souscripteur");
    }
}
