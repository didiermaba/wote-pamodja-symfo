<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/post/blog')]
class PostBlogController extends AbstractController
{
    #[Route('/{id}', name: 'app_post_blog_show', methods: ['GET'])]
    public function show(Post $post): Response
    {
        $comments = $post->getComments();
        return $this->render('post_blog/show.html.twig', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

}
