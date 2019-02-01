<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    /**
     * @Route("/create_categorie", name="create_categorie")
     */
    public function index()
    {
        return $this->render('pages/create.html.twig', [
            'controller_name' => 'CreateController',
        ]);
    }
}
