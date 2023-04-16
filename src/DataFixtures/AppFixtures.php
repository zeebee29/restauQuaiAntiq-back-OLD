<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cat = [
            ['apéritif', 'Apéritifs', 'Nos apéritifs'],
            ['entrées', 'Entrée', 'Nos entrées'],
            ['plats', 'Plat', 'Nos plats'],
            ['dessert', 'Dessert', 'Nos desserts'],
            ['alcool', 'Boissons', 'Nos boissons alcoolisées'],
            ['sans alcool', 'Boissons sans alcool', 'Nos boissons sans alcool'],
            ['vins', 'Vins', 'Nos vins']
        ];

        foreach ($cat as [$name, $titleMenu, $titleCard]) {
            $category = new Categorie();
            $category->setNom($name);
            $category->setTitreMenu($titleMenu);
            $category->setTitreCarte($titleCard);
            $manager->persist($category);
            //$this->setReference('category_' + $name, $category);
        }

        $manager->flush();
    }
}
