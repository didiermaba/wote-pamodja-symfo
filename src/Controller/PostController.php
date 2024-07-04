<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'post',  methods:['GET'])]
    public function index(
        PostRepository $postRepository,
        CategoryRepository $categoryRepository

    ): Response {   

        return $this->render('post/index.html.twig', [
            'posts' => $postRepository->findBy(
                [],
                ['title' => 'ASC'], // ordre ascendant par titre 
                10
            ),

            'categories' => $categoryRepository->findAll()
        ]);
    }

    #[Route('/{category}', name: 'category', methods:['GET'])]
    public function category(
        Request $request, 
        CategoryRepository $categoryRepository,
        PostRepository $postRepository, 
    ): Response {   
        $category = $categoryRepository->findOneBy([
            'name' => $request->get('category')
        ]);

        return $this->render('post/index.html.twig', [
            'categories' => $category,
            'posts' => $postRepository->findBy(['category' => $category])
        ]);
    }
}
