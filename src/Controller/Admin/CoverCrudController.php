<?php

namespace App\Controller\Admin;

use App\Entity\Cover;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CoverCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cover::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('name'),
            ImageField::new('image')
                ->setBasePath('uploads/cover/')
                ->setUploadDir('public/uploads/cover/'),
        ];
    }
    
}
