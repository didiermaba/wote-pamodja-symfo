<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN');
       
    ;
}
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            ImageField::new('image')
                ->setBasePath('uploads/users')
                ->setUploadDir('public/uploads/users/'),
            TextField::new('email'),
            TextField::new('firstname'),
            TextField::new('lastname'),
            TextField::new('nickname'),
            // TextField::new('roles'),
            TextField::new('password'),
        ];
    }
    
}
