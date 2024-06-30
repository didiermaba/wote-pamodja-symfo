<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('roles')
            ->add('nickname')
            // ->add('created_at', null, [
            //     'widget' => 'single_text'
            // ])
            // ->add('isVerified')
            ->add('firstname')
            ->add('lastname')
            ->add('birthyear')
            // ->add('image', FileType ::class, [
            //     'label' => 'Profile pictures',
            //     'mapped' => false,
            //     'required' => false,
            //     'attr' => [
            //         'class' => 'form-control-file'                      
            //     ],
            //     'constraints' => [
            //         new File([
            //             'maxSize' => '1024k',
            //             'mimeTypes' => [
            //                 'image/*',
            //             ],
            //             'mimeTypesMessage' => 'le format de votre fichier est invalide',
            //         ])
            //         ],
            // ])
            ->add('adress')
            ->add('city')
            ->add('country')
            ->add('job')
            ->add('submit', SubmitType::class, [
                'label' => 'save',
                'attr' => [
                    'class' => 'btn btn-custom btn-block' 
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
