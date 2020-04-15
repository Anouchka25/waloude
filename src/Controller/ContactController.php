<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_index", methods={"GET"})
     */
    public function index()
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('contact/index.html.twig', [
                       'our_form' => $form->createView(),
                   ]);
    }

}
