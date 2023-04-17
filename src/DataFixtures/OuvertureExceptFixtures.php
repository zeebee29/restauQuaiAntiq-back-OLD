<?php

namespace App\DataFixtures;

use App\Entity\OuvertureExcept;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OuvertureExceptFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $date1 = new DateTimeImmutable('2023-07-14');
        $date2 = new DateTimeImmutable('2023-12-25');
        $ouverture = new OuvertureExcept();
        $ouverture->setDateOuverture($date1);
        $manager->persist($ouverture);

        $ouverture2 = new OuvertureExcept();
        $ouverture2->setDateOuverture($date2);
        $manager->persist($ouverture2);

        $manager->flush();
    }
}
