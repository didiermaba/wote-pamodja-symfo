<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryArticleController extends AbstractController
{
    #[Route('/category/article', name: 'app_category_article')]
    public function index(): Response
    {
        return $this->render('category_article/index.html.twig', [
            'controller_name' => 'CategoryArticleController',
        ]);
    }
}
