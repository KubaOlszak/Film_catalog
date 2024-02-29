<?php

namespace App\DataFixtures;

use App\Entity\Binder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BinderFixtures extends Fixture
{
    const BINDER_CLRS = ["Orange", "Green", "Blue", "Grey"];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < count(self::BINDER_CLRS); $i++) {
            $binder[$i] = new Binder();
            $binder[$i]->setNo($i);
            $binder[$i]->setTitle("Classeur_".self::BINDER_CLRS[$i]);
            $binder[$i]->setColor(self::BINDER_CLRS[$i]);
            $this->addReference("binder$i", $binder[$i]);
            $manager->persist($binder[$i]);
        }

        $manager->flush();
    }
}
