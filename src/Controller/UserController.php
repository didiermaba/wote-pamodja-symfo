<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/completer_profil', name: 'complete_profile')]
    public function index(
        Request $request,
        EntityManagerInterface $em
    ): Response
    {
        $form = $this->createForm(ProfileType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $user->setNickname($form->get('nickname')->getData());
            $user->setFirstname($form->get('firstname')->getData());
            $user->setLastname($form->get('lastname')->getData());
            $user->setBirthyear($form->get('birthyear')->getData());
            $user->setAdress($form->get('adress')->getData());
            $user->setCity($form->get('city')->getData());
            $user->setCountry($form->get('country')->getData());
            $user->setJob($form->get('job')->getData());

            $em->persist($user);
            $em->flush();

            $this->addFlash('validé', 'Votre profil a été mis à jour');
            return $this->redirectToRoute('account');
        }
        return $this->render('registration/profile.html.twig', [
            'form' => $form
        ]);
    }
} 
