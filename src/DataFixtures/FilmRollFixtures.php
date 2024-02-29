<?php

namespace App\DataFixtures;

use App\Entity\FilmRoll;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FilmRollFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $film1 = new FilmRoll();
        $film1->setBrand($this->getReference('brand0')); // Kodak
        $film1->setName('Tri-X');
        $film1->setSensibility(400);
        $film1->setFormat(135);
        $film1->setType('Noir et blanc');
        $film1->setFramesQty(36);
        $film1->setDeveloper($this->getReference("dev0"));
        $film1->setDevTime(new \DateTime("00:05:00"));
        $film1->setBinder($this->getReference("binder0"));
        $manager->persist($film1);
        
        $film2 = new FilmRoll();
        $film2->setBrand($this->getReference('brand1')); // Iflord
        $film2->setName('HP5+');
        $film2->setSensibility(400);
        $film2->setFormat(135);
        $film2->setType('Noir et blanc');
        $film2->setFramesQty(36);
        $film2->setDeveloper($this->getReference("dev1"));
        $film2->setDevTime(new \DateTime("00:05:30"));
        $film2->setBinder($this->getReference("binder0"));
        $manager->persist($film2);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            BrandFixtures::class,
            DeveloperFixtures::class,
            FixerFixtures::class,
            BinderFixtures::class,
        ];
    }
}