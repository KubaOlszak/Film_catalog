<?php

namespace App\DataFixtures;

use App\Entity\Developer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DeveloperFixtures extends Fixture implements DependentFixtureInterface
{
    const DEV = ['HC-110', 'LC-29', 'Rodinal'];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < count(self::DEV); $i++) {
            $dev[$i] = new Developer();
            $dev[$i]->setBrand($this->getReference('brand'.$i));
            $dev[$i]->setName(self::DEV[$i]);
            $this->setReference("dev$i", $dev[$i]);
            $manager->persist($dev[$i]);
        }
-
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            BrandFixtures::class,
        ];
    }
}