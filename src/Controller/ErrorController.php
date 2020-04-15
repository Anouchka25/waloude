<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error404", name="error404")
     */
    public function index404()
    {
        return $this->render('bundles/TwigBundle/Exception/error404.html.twig');
    }

    /**
     * @Route("/error403", name="error403")
     */
    public function index403()
    {
        return $this->render('bundles/TwigBundle/Exception/error403.html.twig');
    }

    /**
     * @Route("/error", name="error")
     */
    public function index()
    {
        return $this->render('bundles/TwigBundle/Exception/error.html.twig');
    }
}
