<?php

namespace App\DataFixtures;

use App\Entity\OuvertureHebdo;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use DateTimeInterface;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $resaExamples = [
            [new DateTimeInterface('2023-07-17 12:45:00'), 2, null, new DateTimeInterface('2023-04-18 14:30:00'), null,],
            [new DateTimeInterface('2020-06-03 21:00:00'), 5, new DateTimeInterface('2023-04-18 14:31:00'), null,],
            [new DateTimeInterface('2020-01-01 12:00:00'), 7, new DateTimeInterface('2020-04-18 14:31:00'), null,],
        ];

        foreach ($resaExamples as [$dateResa, $nbConvive, $allergie, $createdAt, $modifAt]) {
            $resa = new Reservation();
            $resa->setDateReservation($dateResa);
            $resa->setNbConvive($nbConvive);
            $resa->setAllergie($allergie);
            $resa->setCreatedAt($createdAt);
            $resa->setModifiedAt($modifAt);
            $manager->persist($resa);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            OuvertureHebdo::class,
        ];
    }
}
