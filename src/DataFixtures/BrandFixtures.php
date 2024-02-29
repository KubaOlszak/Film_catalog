<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    const BRAND = ["Kodak", "Ilford", "Agfa", "Orwo", "Tetenal"];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < count(self::BRAND); $i++) {
            $brand[$i] = new Brand();
            $brand[$i]->setName(self::BRAND[$i]);
            $this->addReference("brand$i", $brand[$i]);
            $manager->persist($brand[$i]);
        }

        $manager->flush();
    }
}
