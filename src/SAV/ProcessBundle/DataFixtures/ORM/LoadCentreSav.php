<?php

namespace SAV\ProcessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SAV\ProcessBundle\Entity\CentreSav;

class LoadCentreSav implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $centreSav = new CentreSav();
        $centreSav->setLibelle("Rouillac");
        $centreSav->setEmail("support@techfive.fr");
        $centreSav->setIp("10.10.10.10");
        $centreSav->setPassword("secret");
        $manager->persist($centreSav);

        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}