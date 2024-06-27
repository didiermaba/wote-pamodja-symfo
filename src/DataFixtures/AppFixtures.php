<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

         // Set admin
         $admin = new User();
         $admin->setEmail('admin@admin.fr')
             ->setRoles(['ROLE_ADMIN'])
             ->setFirstname('Admin')
             ->setLastname('Martin')
             ->setNickname('Admin')
             ->setBirthyear($faker->numberBetween(1980, 2000))
             ->setPassword('$2y$13$wqXiXE8U6QhYtIRJFedLA.MkNVmDzn89jVz5CBYENUOwHfAlyYNG2')
             ->setImage('/images/person-1.jpg')
             ->setCreatedAt($faker->dateTimeBetween('-12 months'))
             ->setAdress($faker->address)
             ->setCity($faker->city)
             ->setCountry($faker->country)
             ->setVerified(true);
         $manager->persist($admin);
 
         // Set hosts
         $hosts = [];
         for ($i = 0; $i < 8; $i++) {
             $host = new User();
             $host->setEmail('host' . $i . '@host.fr')
                 ->setRoles(['ROLE_HOST'])
                 ->setFirstname($faker->firstName)
                 ->setLastname($faker->lastName)
                 ->setNickname($faker->userName)
                 ->setBirthyear($faker->numberBetween(1980, 2000))
                 ->setPassword('$2y$13$wqXiXE8U6QhYtIRJFedLA.MkNVmDzn89jVz5CBYENUOwHfAlyYNG2')
                 ->setImage(rand(0,1) ? '/images/person_3.jpg' : '/images/person_4.jpg')
                 ->setCreatedAt($faker->dateTimeBetween('-10 months'))
                 ->setAdress($faker->address)
                 ->setCity($faker->city)
                 ->setCountry($faker->country)
                 ->setJob($faker->jobTitle);
             $manager->persist($host);
             array_push($hosts, $host);
         }

         if ($i > 70) {                
            $user = new User();
            $user->setEmail('user' . $i . '@user.fr')
                ->setRoles(['ROLE_USER'])
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setNickname($faker->userName)
                ->setBirthyear($faker->numberBetween(1980, 2000))
                ->setPassword('$2y$13$wqXiXE8U6QhYtIRJFedLA.MkNVmDzn89jVz5CBYENUOwHfAlyYNG2')
                ->setImage(rand(0,1) ? '/images/person_3.jpg' : '/images/person_4.jpg')
                ->setCreatedAt($faker->dateTimeBetween('-10 months'))
                ->setAdress($faker->address)
                ->setCity($faker->city)
                ->setCountry($faker->country);
            $manager->persist($user);

        }

        $authors = [];
        for ($i=0; $i < 3; $i++) { 
            $author = new User();
            $author->setEmail('author'. $i .'@blog.fr')
            ->setPassword('$2y$13$sje5xwqUEuPg0IoYPI00MeI4ojRR.gobtIPYw/bHjUc7g9a3afM7G')
            ->setFirstname($faker->firstName)
            ->setLastname($faker->lastName)
            ->setNickname($faker->userName)
            ->setBirthyear($faker->numberBetween(1980, 2000))
            ->setRoles(['ROLE_AUTHOR'])
            ->setCreatedAt($faker->dateTimeBetween('-11 months'))
            ->setAdress($faker->address)
            ->setCity($faker->city)
            ->setCountry($faker->country);
            $manager->persist($author);
            array_push($authors, $author);
        }

        // -------------------- Data for test --------------------
        $categories = array('Culture', 'Actionss', 'Mobile', 'Data', 'Divers');
        $catArray = [];
        foreach ($categories as $category) {
            $cat = new Category();
            $cat->setName($category);
            $manager->persist($cat);
            array_push($catArray, $cat);
        }

        for ($i=0; $i <= 100; $i++) { 
            $post = new Post();
            $post->setTitle($faker->text(50))
                ->setSlug($faker->slug)
                ->setContent($faker->text(250))
                ->setImage('https://placehold.co/1280x300/000000/FFF?text=Article' . $i)
                ->setCreatedAt($faker->dateTimeBetween('-9 months'))
                ->setUpdatedAt($faker->dateTimeBetween('-6 months'))
                ->setAuthor($faker->randomElement($authors))
                ->setCategory($faker->randomElement($catArray))
                ->setPublished($faker->boolean(80));
            $manager->persist($post);

            // 3 to 5 comments for each post
            for ($j=0; $j < mt_rand(3, 5); $j++) { 
                $comment = new Comment();
                $comment->setAuthor($faker->randomElement($authors))
                    ->setTitle($faker->text(50))
                    ->setContent($faker->text(250))
                    ->setPost($post);
                $manager->persist($comment);
            }
        }


        
        $manager->flush();
}
}