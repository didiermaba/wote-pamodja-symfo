<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LookupController extends AbstractController
{
    #[Route('/lookup', name: 'app_lookup')]
    public function index(Request $request, PostRepository $postRepository): Response
    {
        $search = $request->query->get('search');
        $posts = $postRepository->findBySearch($search);
        return $this->render('lookup/index.html.twig', [
            'controller_name' => 'LookupController',
            'posts' => $posts
        ]);
    }
}
