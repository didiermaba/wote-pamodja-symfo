<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PaymentController extends AbstractController
{
    #[Route('/don', name: 'donor')]
    public function index(): Response
    {
        return $this->render('payment/index.html.twig', [
           
        ]);
    }

}
