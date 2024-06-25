<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/compte', name: 'account', methods: ['GET', 'POST'])]
    public function account(): Response
    {
        return $this->render('article/account.html.twig', [
            
        ]);
    }
}
