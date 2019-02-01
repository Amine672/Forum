<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

Class PropertyController extends AbstractController{
    /**
     * @Route("/home", name="property.home")
     * @return Response
     */
    public function home(): Response {
        return $this->render('pages/home.html.twig');
    }
}

