<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('page/home.html.twig', [
           
        ]);
    }


    #[Route('/compte', name: 'account', methods: ['GET', 'POST'])]
    public function compte(): Response
    {
        if(!$this->getFirstname()) {
            return $this->redirectToRoute('complete_profile');
        }
        return $this->render('page/account.html.twig', [
            
        ]);
    }

}
