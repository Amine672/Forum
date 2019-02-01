<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Topic;
use App\Entity\Categorie;

class HomeController extends AbstractController{
    
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response{
        $repositoryTopic = $this->getDoctrine()->getRepository(Topic::class);
        $repositoryCategoie = $this->getDoctrine()->getRepository(Categorie::class);
        $topics = $repositoryTopic->findAll();
        $categories = $repositoryCategoie->findAll();
        return $this->render('pages/home.html.twig', array(
            "topics" => $topics,
            "categories" => $categories
        ));
    }

    /**
     * @Route("/topics/{slug}", name="topics") 
     * */
    public function topics($slug) : Response{
        $repositoryTopic = $this->getDoctrine()->getRepository(Topic::class);
        $topics = $repositoryTopic->FindBy(['id' => $slug]);

        return $this->render('pages/topics.html.twig', [
            'topics' => $topics,
            'slug' => $slug
        ]);
    }
    
    /**
     * @Route("/categories/{slug}", name="categories") 
     * */

    public function categories($slug) : Response{
        $repositoryTopic = $this->getDoctrine()->getRepository(Topic::class);
        $topics = $repositoryTopic->FindBy(['categorie' => $slug]);

        return $this->render('pages/categories.html.twig', [
            'topics' => $topics,
            'slug' => $slug
        ]);
    }
}