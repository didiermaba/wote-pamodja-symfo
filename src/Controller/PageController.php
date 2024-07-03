<?php

namespace App\Controller;

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
    ): Response 
    {
       $covers = $coverRepository->findAll() ;
        //  dd($covers);
        return $this->render('page/home.html.twig', [ 
            'covers' => $covers
          
        ]);
    }


    #[Route('/compte', name: 'account', methods: ['GET', 'POST'])]
    public function compte(): Response
    {
       
        return $this->render('page/account.html.twig', [
            
        ]);
    }

}
