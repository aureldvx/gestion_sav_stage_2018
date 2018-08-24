<?php

namespace SAV\ProcessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SAV\ProcessBundle\Entity\ParcoursProduit;
class LoadParcoursProduit implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR023456789');
        $produit->setNumeroSerie('023456789');
        $produit->setClient(1);
        $produit->setReferenceProduit('012345678');
        $produit->setDateAchat(new \DateTime('01/01/2018'));
        $produit->setDateCreationBar(new \DateTime('01/20/2018'));
        $produit->setContratClient(1);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\'aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(false);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR123456789');
        $produit->setNumeroSerie('123456789');
        $produit->setClient(2);
        $produit->setReferenceProduit('112345678');
        $produit->setDateAchat(new \DateTime('01/01/2018'));
        $produit->setDateCreationBar(new \DateTime('04/01/2018'));
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\'aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR223456789');
        $produit->setNumeroSerie('223456789');
        $produit->setClient(3);
        $produit->setReferenceProduit('212345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(false);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR323456789');
        $produit->setNumeroSerie('323456789');
        $produit->setClient(4);
        $produit->setReferenceProduit('312345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR423456789');
        $produit->setNumeroSerie('423456789');
        $produit->setClient(5);
        $produit->setReferenceProduit('412345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(false);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR523456789');
        $produit->setNumeroSerie('523456789');
        $produit->setClient(6);
        $produit->setReferenceProduit('512345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR623456789');
        $produit->setNumeroSerie('623456789');
        $produit->setClient(7);
        $produit->setReferenceProduit('612345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(false);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR723456789');
        $produit->setNumeroSerie('723456789');
        $produit->setClient(8);
        $produit->setReferenceProduit('712345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR823456789');
        $produit->setNumeroSerie('823456789');
        $produit->setClient(9);
        $produit->setReferenceProduit('812345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(false);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $produit = new ParcoursProduit();
        $produit->setNumeroBar('BAR923456789');
        $produit->setNumeroSerie('923456789');
        $produit->setClient(10);
        $produit->setReferenceProduit('912345678');
        $produit->setDateAchat(new \DateTime());
        $produit->setDateCreationBar(new \DateTime());
        $produit->setContratClient(3);
        $produit->setPanneDeclaree('Ecran cassé');
        $produit->setCommentaireClient('j\aime pas ça !');
        $produit->setTraitementPrevu(1);
        $produit->setFaibleValeur(true);
        $produit->setImporte(false);
        $produit->setNumeroSav(12);
        $produit->setPaysSav(1);
        $manager->persist($produit);

        $manager->flush();
    }
}