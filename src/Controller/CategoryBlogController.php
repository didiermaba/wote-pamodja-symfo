<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\Category1Type;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/category/blog')]
class CategoryBlogController extends AbstractController
{
    #[Route('/', name: 'app_category_blog_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category_blog/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/{category}', name: 'app_category_blog_show', methods: ['GET'])]
    public function category(
        Request $request, 
        CategoryRepository $categoryRepository,
        PostRepository $postRepository, 
    ): Response {   
        $category = $categoryRepository->findOneBy([
            'name' => $request->get('category')
        ]);
        return $this->render('category_blog/show.html.twig', [
            'category' => $category,
            'posts' => $postRepository->findBy(['category' => $category])
        ]);
    }    
}
