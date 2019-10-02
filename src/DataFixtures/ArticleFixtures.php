<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        //création de faux articles avec faker sans mettre de 'use'
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=0; $i < 10; $i++) { 
            $article = new Article();
            $article->setTitle($faker->word(2, true))
                    ->setContent($faker->paragraphs(2, true))
                    ->setImage($faker->imageUrl(300, 250))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month'));

            //sauvegarder article (objet) dans un tableau
            $manager->persist($article);
        }
        
        //envoie en bdd
        $manager->flush();
    }
}
