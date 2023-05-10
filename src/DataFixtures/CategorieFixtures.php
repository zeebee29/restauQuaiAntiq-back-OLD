<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cat = [
            ['apéritif', 'Apéritifs', 'Nos grignotages', 1, 'category_aperitif'],
            ['entrées', 'Entrée', 'Nos entrées', 2, 'category_entree'],
            ['plats', 'Plat', 'Nos plats', 3, 'category_plat'],
            ['dessert', 'Dessert', 'Nos desserts', 4, 'category_dessert'],
            ['alcool', 'Boissons', 'Nos apéritifs', 5, 'category_alcool'],
            ['sans alcool', 'Boissons sans alcool', 'Nos sans alcool', 6, 'category_ss_alcool'],
            ['vins', 'Vins', 'Nos vins', 7, 'category_vin']
        ];

        foreach ($cat as [$name, $titleMenu, $titleCard, $ordre, $catName]) {
            $category = new Categorie();
            $category->setNom($name);
            $category->setTitreMenu($titleMenu);
            $category->setTitreCarte($titleCard);
            $category->setOrdreCarte($ordre);
            $manager->persist($category);
            $this->setReference($catName, $category);
        }

        $manager->flush();
    }
}
