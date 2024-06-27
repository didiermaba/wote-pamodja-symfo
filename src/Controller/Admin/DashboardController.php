<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\CategoryArticle;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\Cover;
use App\Entity\Comment;
use App\Entity\Invoice;
use App\Entity\Payment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('user/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/images/logo.png" width="40"> Wote Pamodja')
            ->setFaviconPath('/images/logo.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Post', 'fas fa-book', Post::class);
        yield MenuItem::linkToCrud('Paiement', 'fas fa-file', Payment::class);
        yield MenuItem::linkToCrud('Factures', 'fas fa-file-text', Invoice::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-image', Cover::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment', Comment::class);
        yield MenuItem::linkToCrud('Categories-Posts', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Categories-Articles', 'fas fa-tags', CategoryArticle::class);
        yield MenuItem::linkToCrud('Articles', 'fas fa-book', Article::class);
        yield MenuItem::linkToRoute('Acueil', 'fas fa-arrow-left', 'home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
/*
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getFullName())
            // use this method if you don't want to display the name of the user
            ->displayUserName(false)

            // you can return an URL with the avatar image
            // ->setAvatarUrl('https://...')
            ->setAvatarUrl('/uploads/users/'. $user->getImage())
            // use this method if you don't want to display the user image
            ->displayUserAvatar(false)
            // you can also pass an email address to use gravatar's service
            // ->setGravatarEmail($user->getMainEmailAddress())

            // you can use any type of menu item, except submenus
            ->addMenuItems([
                // MenuItem::linkToRoute('My Profile', 'fa fa-id-card', '...', ['...' => '...']),
                // MenuItem::linkToRoute('Settings', 'fa fa-user-cog', '...', ['...' => '...']),
                // MenuItem::section(),
                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ]);
    }*/
}
