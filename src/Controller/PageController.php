<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CoverRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(
        Request $request,
        CoverRepository $coverRepository,
        ArticleRepository $articleRepository,
    ): Response 
    {
       $covers = $coverRepository->findAll() ;
       $articles = $articleRepository->findAll();
        return $this->render('page/home.html.twig', [ 
            'covers' => $covers,
            'articles' => $articles
          
        ]);
    }

}
