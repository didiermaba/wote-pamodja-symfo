<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\Comment1Type;
use App\Repository\CommentRepository;
use DateTime;
use DateTimeImmutable;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/post/{id}/comment/blog')]
class CommentBlogController extends AbstractController
{
    #[Route('/new', name: 'app_comment_blog_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Post $post, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        // $comment->setCreatedAt(new DateTimeImmutable());
        $comment->setAuthor($this->getUser());
        $comment->setPost($post);
        $form = $this->createForm(Comment1Type::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_post_blog_show', [
                'id' => $post->getId() 
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comment_blog/new.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}/edit', name: 'app_comment_blog_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(Comment1Type::class, $comment);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_comment_blog_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('comment_blog/edit.html.twig', [
    //         'comment' => $comment,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_comment_blog_delete', methods: ['POST'])]
    // public function delete(Request $request, Comment $comment, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->getPayload()->getString('_token'))) {
    //         $entityManager->remove($comment);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_comment_blog_index', [], Response::HTTP_SEE_OTHER);
    // }
}
