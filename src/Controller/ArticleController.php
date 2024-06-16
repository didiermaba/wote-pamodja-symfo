<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/apropos', name: 'apropos')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            
        ]);
    }
}
