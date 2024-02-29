<?php

namespace App\DataFixtures;

use App\Entity\Fixer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FixerFixtures extends Fixture implements DependentFixtureInterface
{
    const FIX = ['Rapid Fixer w/ Hardener', 'RapidFixer', 'Superfix'];

    public function load(ObjectManager $manager): void
    {
        $fix1 = new Fixer();
        $fix1->setBrand($this->getReference('brand0'));
        $fix1->setName(self::FIX[0]);
        $manager->persist($fix1);
        
        $fix2 = new Fixer();
        $fix2->setBrand($this->getReference('brand1'));
        $fix2->setName(self::FIX[1]);
        $manager->persist($fix2);

        $fix3 = new Fixer();
        $fix3->setBrand($this->getReference('brand4'));
        $fix3->setName(self::FIX[2]);
        $manager->persist($fix3);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            BrandFixtures::class,
        ];
    }
}