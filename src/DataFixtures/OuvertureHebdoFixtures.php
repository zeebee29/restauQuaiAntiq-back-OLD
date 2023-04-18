<?php

namespace App\DataFixtures;

use App\Entity\OuvertureHebdo;
use DateTimeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OuvertureHebdoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ouvertureExamples = [
            ['lundi',    new DateTimeInterface('2020-01-01 12:00:00'), new DateTimeInterface('2020-01-01 14:30:00'), 'resaLundiMidi',],
            ['lundi',    new DateTimeInterface('2020-01-01 19:00:00'), new DateTimeInterface('2020-01-01 22:00:00'), 'resaLundiSoir',],
            ['mardi',    new DateTimeInterface('2020-01-01 12:00:00'), new DateTimeInterface('2020-01-01 14:30:00'), 'resaMardiMidi',],
            ['mardi',    new DateTimeInterface('2020-01-01 19:00:00'), new DateTimeInterface('2020-01-01 22:00:00'), 'resaMardiSoir',],
            ['jeudi',    new DateTimeInterface('2020-01-01 12:00:00'), new DateTimeInterface('2020-01-01 14:30:00'), 'resaJeudiMidi',],
            ['jeudi',    new DateTimeInterface('2020-01-01 19:00:00'), new DateTimeInterface('2020-01-01 22:00:00'), 'resaJeudiSoir',],
            ['vendredi', new DateTimeInterface('2020-01-01 12:00:00'), new DateTimeInterface('2020-01-01 14:30:00'), 'resaVendrediMidi',],
            ['vendredi', new DateTimeInterface('2020-01-01 19:00:00'), new DateTimeInterface('2020-01-01 22:00:00'), 'resaVendrediSoir',],
            ['samedi',   new DateTimeInterface('2020-01-01 12:00:00'), new DateTimeInterface('2020-01-01 14:30:00'), 'resaSamediMidi',],
            ['samedi',   new DateTimeInterface('2020-01-01 19:00:00'), new DateTimeInterface('2020-01-01 22:00:00'), 'resaSamediSoir',],
            ['dimanche', new DateTimeInterface('2020-01-01 12:00:00'), new DateTimeInterface('2020-01-01 14:30:00'), 'resaDimancheMidi',],
        ];

        foreach ($ouvertureExamples as [$jSem, $openH, $closeH, $resa]) {
            $opening = new OuvertureHebdo();
            $opening->setJourSemaine($jSem);
            $opening->setHOuverture($openH);
            $opening->setHFermeture($closeH);
            $manager->persist($opening);
            $this->setReference($resa, $opening);
        }

        $manager->flush();
    }
}
